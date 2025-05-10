<?php

namespace App\Actions\ProductSummary;

use App\Models\Product;
use App\Models\ProductSummary;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateOrCreateProductSummary extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public Product $product,
        public int     $rating = 0,
        public int     $total_selling = 0,
        bool           $usingDBTransaction = false
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

    /**
     * @return mixed
     */
    public function handle(): mixed
    {
        /** @var ProductSummary $summary */
        $summary = ProductSummary::query()->firstOrCreate(
            ['product_id' => $this->product->id],
            [
                'total_reviews' => 0,
                'total_rating' => 0,
                'average_rating' => 0,
                'total_selling' => 0
            ]
        );

        if ($this->rating > 0){
            $newTotalReview = $summary->total_reviews + 1;
            $newTotalRating = $summary->total_rating + $this->rating;
            $summary->total_reviews = $newTotalReview;
            $summary->total_rating = $newTotalRating;
            $summary->average_rating = $newTotalRating / $newTotalReview;
        }
        $summary->total_selling = $summary->total_selling + $this->total_selling;

        $summary->save();

        return $summary;
    }
}
