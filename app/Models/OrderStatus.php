<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\OrderStatusEnum;

class OrderStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getByName($name)
    {
        return OrderStatus::where('name', $name)->first();
    }

    public static function getIdByEnum(OrderStatusEnum $status): int
    {
        return OrderStatus::where('name', $status->value)->first()->id;
    }
}
