<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'menu_id',
        'food_category_id'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot(['quantity', 'item_rating']);
    }

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public static function deleteByMenuId($id) {
        $foodItems = FoodItem::where('menu_id', $id);
        $foodItems->delete();
    }
}
