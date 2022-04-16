<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Employee;

class EmployeeController extends Controller
{
    public function store(Request $request) {
        //POST
        $employee = new Employee();
    }
}
