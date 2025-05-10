<?php

namespace App\Queries;

use App\Models\Product;
use App\Models\ProductSummary;
use Illuminate\Database\Eloquent\Builder;
use Winata\QueryBuilder\Abstracts\BaseQueryBuilder;

class ProductQuery extends BaseQueryBuilder
{

    public function getBaseQuery(): Builder
    {
        return Product::query();
    }

    public function applyFilterParams(): void
    {
        $this->builder->when(
            request()->input('hot') === 'recommended',
            function (Builder $builder) {
                $builder->whereHas('summary') // just ensure the relation exists
                ->with('summary')     // eager load it if needed
                ->orderByDesc(
                    ProductSummary::query()->select('average_rating')
                        ->whereColumn('product_summaries.product_id', 'products.id') // adjust columns as needed
                        ->limit(1)
                );
            }
        );
    }
}
