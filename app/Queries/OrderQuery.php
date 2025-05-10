<?php

namespace App\Queries;

use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Winata\QueryBuilder\Abstracts\BaseQueryBuilder;

class OrderQuery extends BaseQueryBuilder
{

    public function getBaseQuery(): Builder
    {
        return Order::query()
            ->orderBy('created_at', 'desc')
            ->with(['user']);
    }

    public function applyFilterParams(): void
    {
        $this->builder
            ->when(!empty(request()->input('user_id')), function (Builder $builder) {
                $builder->where('user_id', request()->input('user_id'));
            });
    }
}
