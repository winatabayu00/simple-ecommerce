<?php

namespace App\Queries;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Builder;
use Winata\QueryBuilder\Abstracts\BaseQueryBuilder;

class CartQuery extends BaseQueryBuilder
{

    public function getBaseQuery(): Builder
    {
        return CartItem::query()
            ->orderBy('created_at', 'desc')
            ->with(['product']);
    }

    public function applyFilterParams(): void
    {
        $this->builder
            ->when(!empty(request()->input('user_id')), function (Builder $builder) {
                $builder->where('user_id', request()->input('user_id'));
            });
    }
}
