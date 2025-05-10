<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateCartItem extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public CartItem $cartItem,
        public array    $inputs,
        bool            $usingDBTransaction = false
    )
    {
        parent::__construct($usingDBTransaction);
    }

    /**
     * @return BaseAction
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function rules(): BaseAction
    {
        $validated = $this->validate(
            inputs: $this->inputs,
            rules: [
                'quantity' => ['required', 'numeric', 'gt:0'],
            ]
        );

        User::query()->findOrFail($validated['user_id']);
        Cart::query()->findOrFail($validated['cart_id']);
        Product::query()->findOrFail($validated['product_id']);

        return $this;
    }

    public function handle(): CartItem
    {
        $input = CartItem::getFillableAttribute($this->validatedData);
        $this->cartItem->update($input);

        return $this->cartItem;
    }
}
