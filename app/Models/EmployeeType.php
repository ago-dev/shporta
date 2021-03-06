<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function employee() {
        return $this->hasMany(Employee::class);
    }

    public static function getTypeByName($employeeType)
    {
        return EmployeeType::where('name', $employeeType)->first();
    }
}
