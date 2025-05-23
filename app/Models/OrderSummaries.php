<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * @property string $id
 * @property Carbon $group_date
 * @property int $total_orders
 * @property float $total_incomes
 * @property float $total_sales
 * */
class OrderSummaries extends Model
{
    use HasUuids;

    protected $table = 'orders_summaries';

    protected $fillable = [
        'group_date',
        'total_orders',
        'total_incomes',
        'total_sales',
    ];

    protected $casts = [
        'total_orders' => 'integer',
        'total_incomes' => 'float',
        'total_sales' => 'float',
    ];
}
