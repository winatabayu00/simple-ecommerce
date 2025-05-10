<?php

namespace App\Services;

use App\Actions\Cart\AddToCart;
use App\Actions\Cart\RemoveItemFromCart;
use App\Actions\Order\CreateOrder;
use App\Actions\OrderItem\CreateOrderItem;
use App\Actions\Product\UpdateProductStock;
use App\Actions\ProductSummary\UpdateOrCreateProductSummary;
use App\Actions\Review\CreateReview;
use App\Enums\OrderStatus;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseService;

class ShoppingService extends BaseService
{

    /**
     * @param User $user
     * @param array $inputs
     * @return void
     * @throws AuthorizationException
     * @throws ValidationException
     * @throws \Throwable
     */
    public function addToCart(User $user, array $inputs): void
    {
        $validated = $this->validate(
            inputs: $inputs,
            rules: [
                'product_id' => ['required', 'uuid'],
                'quantity' => ['required', 'numeric', 'gt:0'],
            ]
        );

        $user->loadMissing('cart');

        $validated['user_id'] = $user->id;
        $validated['cart_id'] = $user->cart->id;

        DB::transaction(function () use ($validated, $user) {
            // add to cart
            (new AddToCart($validated))->execute();

            // decrease stock
            $validated['quantity'] = $validated['quantity'] * -1;
            (new UpdateProductStock($validated))->execute();
        });
    }

    /**
     * @param CartItem $cartItem
     * @return void
     * @throws \Throwable
     */
    public function removeItemFromCart(CartItem $cartItem): void
    {
        DB::transaction(function () use ($cartItem) {
            $productId = $cartItem->product_id;
            $stockRollback = $cartItem->quantity;

            (new RemoveItemFromCart(cartItem: $cartItem))->execute();

            $updateProductData = [
                'product_id' => $productId,
                'quantity' => $stockRollback,
            ];
            (new UpdateProductStock($updateProductData))->execute();
        });
    }

    /**
     * @param User $user
     * @return void
     */
    public function addCartToOrder(User $user): void
    {
        $cartFromUser = $user->cart;
        $cartItems = $cartFromUser->cartItems;

        $dataOrderItems = [];
        $totalPrice = 0;
        /** @var CartItem $cartItem */
        foreach ($cartItems as $cartItem) {
            $cartItem->loadMissing('product');

            $subtotal = $cartItem->product->price * $cartItem->quantity;
            $totalPrice = $totalPrice + $subtotal;

            $dataOrderItems[] = [
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ];
        }

        DB::transaction(function () use ($cartFromUser, $user, $dataOrderItems, $totalPrice) {
            // creating order
            $dataOrder = [
                'user_id' => $user->id,
                'status' => OrderStatus::PLACED->value,
                'total' => $totalPrice,
            ];
            $order = (new CreateOrder($dataOrder))->execute();

            // insert items on cart to order items
            foreach ($dataOrderItems as $dataOrderItem) {
                $dataOrderItem['order_id'] = $order->id;
                (new CreateOrderItem($dataOrderItem))->execute();

                $product = Product::query()->findOrFail($dataOrderItem['product_id']);

                (new UpdateOrCreateProductSummary($product, total_selling: $dataOrderItem['quantity']))->execute();
            }

            // delete cart items user after creating order
            $cartFromUser->cartItems()->delete();
        });
    }

    public function giveRating(User $user, array $inputs): void
    {
        DB::transaction(function () use ($user, $inputs) {
            // create review
            (new CreateReview($user, $inputs))->execute();

            // update summary
            $product = Product::query()->findOrFail($inputs['product_id']);
            (new UpdateOrCreateProductSummary($product, rating: $inputs['rating']))->execute();
        });
    }
}
