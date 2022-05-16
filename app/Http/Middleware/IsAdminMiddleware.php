<?php

namespace App\Http\Middleware;

use App\Enum\EmployeeRoleEnum;
use App\Enum\UserRoleEnum;
use App\Models\Employee;
use App\Models\EmployeeType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user->role->name == UserRoleEnum::EMPLOYEE->value) {
            $employee = Employee::getEmployeeByUserId($user->id);
            $type = EmployeeType::where('id', $employee->employee_type_id)->first();
            if ($type->name != EmployeeRoleEnum::ADMINISTRATOR->value) {
                return response(view('errors.403'));
            }
        }

        return $next($request);
    }
}
