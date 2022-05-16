<?php

namespace App\Enum;

enum OrderStatusEnum:string {
    case PENDING = "Pending";
    case DELIVERED = "Delivered";
    case REJECTED = "Rejected";
}
