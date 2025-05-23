<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\OrderQuery;
use App\Queries\OrderSummaryQuery;
use App\Queries\UserQuery;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

#[Attributes\Prefix('dashboard')]
#[Attributes\Name('dashboard', false, true)]
class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->setPageTitle('Dashboard');
        $this->setBreadCrumb(['title' => 'Dashboard']);

    }

    /**
     * @param Request $request
     * @return View
     */
    #[Attributes\Get('', 'index')]
    public function index(Request $request): View
    {
        $orders = OrderQuery::filterColumn()
            ->orderColumn()
            ->getAllDataPaginated();

        $this->setData('orders', $orders);

        $request->mergeIfMissing([
            'start_date' => $request->input('start_date', now()->startOfMonth()->toDateString()),
            'end_date' => $request->input('end_date', now()->endOfMonth()->toDateString()),
        ]);

        $orderSummaries = OrderSummaryQuery::filterColumn()
            ->orderColumn()
            ->getAllData();

        $totalIncomes = $orderSummaries->sum('total_incomes');
        $averageIncome = $totalIncomes / $orderSummaries->count();
        $totalSales = $orderSummaries->sum('total_sales');

        $this->setData('order_summaries', $orderSummaries);
        $this->setData('total_incomes', $totalIncomes);
        $this->setData('average_incomes', $averageIncome);
        $this->setData('total_sales', $totalSales);

        $customers = UserQuery::where('role', '!=', 'admin')
            ->filterColumn()
            ->orderColumn()
            ->getAllData();
        $this->setData('total_customers', $customers->count());

        $chartData = [
            'categories' => $orderSummaries->sortBy('group_date')->pluck('group_date')->map(function ($date) {
                return \Carbon\Carbon::parse($date)->format('d M');
            }),
            'series' => $orderSummaries->sortBy('group_date')->pluck('total_incomes')->map(fn($val) => (float) $val)
        ];

        $this->setData('chartData', $chartData);

        return $this->view('pages.admin.dashboard.index');
    }
}
