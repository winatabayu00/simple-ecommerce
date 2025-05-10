<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $stock
 * @property string $image
 * @property Collection<OrderItem> $orderItems
 * @property Collection<Review> $reviews
 * @property ProductSummary $summary
 * */
class Product extends Model implements HasMedia
{
    use HasUuids;
    use InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    protected $casts = [
        ''
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function summary(): HasOne
    {
        return $this->hasOne(ProductSummary::class, 'product_id');
    }
}
