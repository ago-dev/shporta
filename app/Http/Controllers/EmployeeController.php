<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $employees = Employee::list();
        $employeeTypes = EmployeeType::all();
        return view('pages.dashboard.employees.employees',
            compact('employees', 'employeeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $user = User::store($request, UserRoleEnum::EMPLOYEE);
        Employee::store($request, $user);
        return redirect()->back()->with('message', 'Successfully created employee account!');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(EmployeeUpdateRequest $request)
    {
        Employee::edit($request);
        return redirect()->back()->with('message', 'Successfully updated employee account!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Employee::deactivate($request['id']);
        return redirect()->back()->with('message', 'Successfully deactivated employee account!');
    }
}
