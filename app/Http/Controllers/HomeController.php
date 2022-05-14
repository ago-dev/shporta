<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Models\Role;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        # $this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        return view('pages.dashboard.dashboard');
    }
}
