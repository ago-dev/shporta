<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_datetime', 'address', 'customer_id', 'order_points', 'delivery_datetime'];
    public $timestamps = false;

    public static function store($data): Order {
        return Order::create([
            'order_datetime' => $data['orderDatetime'],
            'delivery_datetime' => $data['deliveryDatetime'],
            'address' => $data['address'],
            'order_points' => $data['orderPoints'],
            'customer_id' => $data['customerId']
        ]);
    }
}
