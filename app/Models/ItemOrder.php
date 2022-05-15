<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['quantity', 'order_id', 'food_item_id'];

    public static function store($data): ItemOrder {
        return ItemOrder::create([
            'quantity' => $data['quantity'],
            'order_id' => $data['orderId'],
            'food_item_id' => $data['foodItemId']
        ]);
    }

}
