<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function list(): LengthAwarePaginator
    {
        return order::paginate(5);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->belongsToMany(FoodItem::class, 'item_order')
                    ->withPivot(['quantity', 'item_rating']);
    }

    public function totalPrice()
    {
        if (empty($this->items)) return 0;

        $totalPrice = 0;
        foreach($this->items as $item)
            $totalPrice += $item->pivot->quantity * $item->price;
            
        return '$' . $totalPrice;
    }
}
