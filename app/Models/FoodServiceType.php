<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodServiceType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getTypeByName($type): FoodServiceType {
        return FoodServiceType::where('name', $type)->first();
    }
}
