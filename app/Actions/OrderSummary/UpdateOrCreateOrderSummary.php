<?php

namespace App\Actions\OrderSummary;

use App\Models\OrderSummaries;
use Carbon\Carbon;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateOrCreateOrderSummary extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public Carbon $groupDate,
        public float  $revenue,
        public float  $sales,
        bool          $usingDBTransaction = false
    )
    {
        parent::__construct($usingDBTransaction);
    }

    /**
     * @return BaseAction
     */
    public function rules(): BaseAction
    {

        return $this;
    }

    public function handle(): OrderSummaries
    {
        /** @var OrderSummaries $orderSummary */
        $orderSummary = OrderSummaries::query()
            ->firstOrCreate([
                'group_date' => $this->groupDate->toDateString(),
            ], [
                'group_date' => $this->groupDate->toDateString(),
            ]);

        $orderSummary->total_orders = $orderSummary->total_orders + 1;
        $orderSummary->total_incomes = $orderSummary->total_incomes + $this->revenue;
        $orderSummary->total_sales = $orderSummary->total_sales + $this->sales;
        $orderSummary->save();

        return $orderSummary;
    }
}
