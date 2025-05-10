<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case WAITING_PAYMENT = 'waiting_payment';
    case PLACED = 'placed';
}
