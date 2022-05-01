<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot(['quantity', 'item_rating']);
    }
}
