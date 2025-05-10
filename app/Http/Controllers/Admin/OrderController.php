<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Queries\OrderQuery;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;

#[Attributes\Prefix('orders')]
#[Attributes\Name('orders', false, true)]
class OrderController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->setPageTitle('Order Listings');
        $this->setBreadCrumb(['title' => 'Order Listings']);
    }

    /**
     * @return View
     */
    #[Attributes\Get('', 'index')]
    public function index(): View
    {
        $orders = OrderQuery::filterColumn()
            ->orderColumn()
            ->getAllDataPaginated();

        $this->setData('orders', $orders);
        return $this->view('pages.admin.order.index');
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
        return $this->view('pages.admin.order.detail');
    }
}
