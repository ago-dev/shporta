<?php

namespace App\Models;

use App\Enum\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function store($data, $user): Employee {
        return Employee::create([
            'user_id' => $user['id'],
            'employee_type_id' => EmployeeType::getTypeByName($data['role'])->id
        ]);
    }
}
