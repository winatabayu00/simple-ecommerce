<?php

namespace App\Queries;

use App\Models\CartItem;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Winata\QueryBuilder\Abstracts\BaseQueryBuilder;

class ReviewQuery extends BaseQueryBuilder
{

    public function getBaseQuery(): Builder
    {
        return Review::query()
            ->orderBy('created_at', 'desc')
            ->with(['product']);
    }

    public function applyFilterParams(): void
    {
        $this->builder
            ->when(!empty(request()->input('user_id')), function (Builder $builder) {
                $builder->where('user_id', request()->input('user_id'));
            })
            ->when(!empty(request()->input('product_id')), function (Builder $builder) {
                $builder->where('product_id', request()->input('product_id'));
            });
    }
}
