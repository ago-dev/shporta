<?php

namespace App\Models;

use App\Http\Requests\DeleteMenuRequest;
use App\Http\Requests\StoreMenuRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'food_service_id'
    ];

    public function foodService()
    {
        return $this->belongsTo(FoodService::class);
    }

    public function foodItems()
    {
        return $this->hasMany(FoodItem::class);
    }

    public static function store(StoreMenuRequest $request) {
        $foodService = FoodService::where('name', $request['foodService'])->first();
        return Menu::create([
            "food_service_id" => $foodService->id
        ]);
    }

    public static function deleteByFoodServiceId($id) {
        //bad practice - should be done in db schema via cascade, temporary
        $menu = Menu::where('food_service_id', $id)->first();
        FoodItem::deleteByMenuId($menu->id);
        $menu->delete();
    }

    public static function deleteById(DeleteMenuRequest $request) {
        //bad practice - should be done in db schema via cascade, temporary
        $menu = Menu::where('id', $request['id'])->first();
        FoodItem::deleteByMenuId($menu->id);
        $menu->delete();
    }
}
