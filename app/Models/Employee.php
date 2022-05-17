<?php

namespace App\Models;

use App\Enum\ActivationEnum;
use App\Enum\EmployeeRoleEnum;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'employee_type_id', 'is_active'];


    public function type()
    {
        return $this->belongsTo(EmployeeType::class);

    }

    public static function store($data, $user): Employee {
        return Employee::create([
            'user_id' => $user['id'],
            'employee_type_id' => EmployeeType::getTypeByName($data['role'])->id
        ]);
    }

    public static function deactivate($id) {
        $userId = Employee::select('user_id')->where('id', $id)->first();
        $user = User::find($userId)->first();
        if ($user) {
            $user->is_active = ActivationEnum::IS_INACTIVE->value;
            $user->save();
        }
    }

    public static function list(): LengthAwarePaginator
    {
        return DB::table('employees')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->join('employee_types', 'employees.employee_type_id', '=', 'employee_types.id')
            ->select(
                'users.first_name as firstName',
                'users.last_name as lastName',
                'users.username as username',
                'users.email as email',
                'employee_types.name as employeeType',
                'employees.id as id',
                DB::raw('DATE_FORMAT(users.date_created, "%d %b %Y") AS dateCreated'))
            ->where('users.is_active', '=', ActivationEnum::IS_ACTIVE->value)
            ->where('employee_types.name', '!=', EmployeeRoleEnum::ADMINISTRATOR->value)
            ->orderBy('users.date_created', 'desc')
            ->paginate(5);
    }

    public static function edit(EmployeeUpdateRequest $request) {
        $employee = Employee::find($request['id']);
        $employeeType = $request['roleUpdate'];
        if(isset($employeeType)) {
            $employee->employee_type_id = EmployeeType::getTypeByName($request['roleUpdate'])->id;
            $employee->save();
        }
        User::edit($request, $employee['user_id']);
    }

    public static function getEmployeeByUserId($userId) {
        return Employee::where('user_id', $userId)->first();
    }
}
