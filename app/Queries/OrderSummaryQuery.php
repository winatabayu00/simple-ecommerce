<?php

namespace App\Queries;

use App\Models\CartItem;
use App\Models\OrderSummaries;
use Illuminate\Database\Eloquent\Builder;
use Winata\QueryBuilder\Abstracts\BaseQueryBuilder;

class OrderSummaryQuery extends BaseQueryBuilder
{

    public function getBaseQuery(): Builder
    {
        return OrderSummaries::query()
            ->orderBy('group_date', 'desc');
    }

    public function applyFilterParams(): void
    {
        $this->builder->when(!empty(request()->input('start_date')), function (Builder $query) {
            $query->whereDate('group_date', '>=', request()->input('start_date'));
        })->when(!empty(request()->input('end_date')), function (Builder $query) {
            $query->whereDate('group_date', '<=', request()->input('end_date'));
        });
    }
}
