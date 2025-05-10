<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Queries\CartQuery;
use App\Queries\OrderQuery;
use App\Services\ShoppingService;
use Dentro\Yalr\Attributes;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

#[Attributes\Prefix('my-order')]
#[Attributes\Name('my-order', false, true)]
class OrderController extends Controller
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

        $orders = OrderQuery::filterColumn()
            ->orderColumn()
            ->getAllDataPaginated();

        $this->setData('orders', $orders);
        return $this->view('pages.app.order.index');
    }

    /**
     * @param Order $order
     * @return View
     */
    #[Attributes\Get('{order}/detail', 'detail')]
    public function detail(Order $order): View
    {
        $order->loadMissing('orderItems');
        $this->setData('order', $order);
        return $this->view('pages.app.order.detail');
    }
}
