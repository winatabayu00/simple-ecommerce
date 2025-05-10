<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property string $id
 * @property string $product_id
 * @property string $user_id
 * @property string $rating
 * @property string $comment
 * @property User $user
 * @property Product $product
 * */
class Review extends Model
{
    use HasUuids;
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
