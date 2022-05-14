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
}
