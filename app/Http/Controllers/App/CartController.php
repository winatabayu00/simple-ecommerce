<?php

namespace App\Http\Controllers\App;

use App\Enums\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\User;
use App\Queries\CartQuery;
use App\Services\ShoppingService;
use Dentro\Yalr\Attributes;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

#[Attributes\Prefix('cart')]
#[Attributes\Name('cart', false, true)]
class CartController extends Controller
{
    /**
     * @return View
     */
    #[Attributes\Get('', 'index')]
    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();

        $this->request->mergeIfMissing(['user_id' => $user->id]);

        $carts = CartQuery::filterColumn()
            ->orderColumn()
            ->getAllDataPaginated();

        $this->setData('carts', $carts);

        $paymentMethods = PaymentMethod::cases();
        $this->setData('paymentMethods', $paymentMethods);
        return $this->view('pages.app.cart.index');
    }


    /**
     * @param Request $request
     * @param ShoppingService $service
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws ValidationException
     * @throws \Throwable
     */
    #[Attributes\Post('add-to-cart', 'add-to-cart')]
    public function addToCart(Request $request, ShoppingService $service): RedirectResponse
    {
        /** @var User $user */
        $user = \auth()->user();
        $service->addToCart($user, $request->input());

        successToast('Success Add to Cart');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param CartItem $cartItem
     * @param ShoppingService $service
     * @return RedirectResponse
     * @throws \Throwable
     */
    #[Attributes\Delete('{cartItem}/remove-from-cart', 'remove-from-cart')]
    public function removeFromCart(Request $request, CartItem $cartItem, ShoppingService $service): RedirectResponse
    {
        $service->removeItemFromCart($cartItem);

        successToast('Remove Item Cart');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param ShoppingService $service
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    #[Attributes\Post('checkout', 'checkout')]
    public function checkout(Request $request, ShoppingService $service): RedirectResponse
    {
        /** @var User $user */
        $user = \auth()->user();
        $service->addCartToOrder($user, $request->input());

        successToast('Remove Item Cart');
        return redirect()->back();
    }


}
