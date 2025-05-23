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
        $rating = request()->input('rating');

        $this->builder->when(
            request()->input('hot') === 'recommended',
            function (Builder $builder) {
                $builder->whereHas('summary')
                    ->with('summary')
                    ->orderByDesc(
                        ProductSummary::query()->select('average_rating')
                            ->whereColumn('product_summaries.product_id', 'products.id') // adjust columns as needed
                            ->limit(1)
                    );
            })->when(
            request()->input('hot') === 'best_seller',
            function (Builder $builder) {
                $builder->whereHas('summary')
                    ->with('summary')
                    ->orderByDesc(
                        ProductSummary::query()->select('total_selling')
                            ->whereColumn('product_summaries.product_id', 'products.id') // adjust columns as needed
                            ->limit(1)
                    );
            })->when(
            request()->input('hot') === 'most_popular',
            function (Builder $builder) {
                $builder->whereHas('summary')
                    ->with('summary')
                    ->orderByDesc(
                        ProductSummary::query()->select('total_reviews')
                            ->whereColumn('product_summaries.product_id', 'products.id') // adjust columns as needed
                            ->limit(1)
                    );
            })
            ->when($rating, function (Builder $builder) use ($rating) {
                $builder->whereHas('summary', function (Builder $builder) use ($rating) {
                    $builder->where('average_rating', '>=', $rating);
                });
            })
            ->when(!empty(request()->input('min_price')), function (Builder $builder) use ($rating) {
                $builder->where('price', '>=', request()->input('min_price'));
            })
            ->when(!empty(request()->input('max_price')), function (Builder $builder) use ($rating) {
                $builder->where('price', '<=', request()->input('max_price'));
            });
    }
}
