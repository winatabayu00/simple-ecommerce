<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $product_id
 * @property int $total_reviews
 * @property int $total_rating
 * @property int $average_rating
 * @property int $total_selling
 * @property Product $product
 * */
class ProductSummary extends Model
{
    use HasUuids;

    protected $table = 'product_summaries';

    protected $fillable = [
        'product_id',
        'total_reviews',
        'total_rating',
        'average_rating',
        'total_selling',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
