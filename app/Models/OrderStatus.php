<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getByName($name)
    {
        return OrderStatus::where('name', $name)->first();
    }
}
