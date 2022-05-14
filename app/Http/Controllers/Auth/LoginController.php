<?php

namespace App\Http\Controllers\Auth;

use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::WELCOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * [authenticated is used to redirect user after login based on role]
     * @param  Request $request [request object]
     * @param  [type]  $user    [user object to check user role]
     * @return [type]           [return type]
     */
    protected function authenticated(Request $request, $user)
    {
        $employeeRoleId = Role::getRoleByName(UserRoleEnum::EMPLOYEE)->id;

        if($user->role_id == $employeeRoleId) {
            return redirect('/home');

        } else {
            return redirect('/welcome');
        }
    }
}
