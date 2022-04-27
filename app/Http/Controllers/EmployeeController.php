<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $employees = DB::table('employees')->join('users', 'employees.user_id', '=', 'users.id')
                                                 ->join('employee_types', 'employees.employee_type_id', '=', 'employee_types.id')
                                                 ->select('users.first_name as firstName', 'users.last_name as lastName', 'users.email as email',
                                                          'users.date_created as dateCreated', 'employee_types.name as employeeType')
                                                 ->orderBy('users.date_created', 'desc')
                                                 ->get();
        return view('employees', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $userData = array("firstName" => $request->get("firstName"),
            "lastName" => $request->get("lastName"),
            "username" => $request->get("username"),
            "email" => $request->get("email"),
            "password" => $request->get("password"),
            "role" => $request->get("role"));

        $user = User::store($userData, UserRoleEnum::EMPLOYEE);
        Employee::store($userData, $user);
        return redirect()->back()->with('message', 'Successfully created employee account!');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateEmployeeRequest $request
     * @param Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
