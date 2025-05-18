<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case COD = 'cod';
    case ONLINE_TRANSFER = 'online_transfer';

    public function label(): string
    {
        return match ($this) {
            self::COD => 'Cash On Delivery',
            self::ONLINE_TRANSFER => 'Online Transfer',
        };
    }
}
