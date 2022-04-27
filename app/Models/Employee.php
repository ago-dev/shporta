<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'employee_type_id'];


    public static function store($data, $user): Employee {
        return Employee::create([
            'user_id' => $user['id'],
            'employee_type_id' => EmployeeType::getTypeByName($data['role'])->id
        ]);
    }
}
