<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodServiceType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function foodService()
    {
        return $this->hasMany('App\Models\FoodService');
    }

    public static function getTypeByName($type) {
        return FoodServiceType::where('name', $type)->first();
    }
}
