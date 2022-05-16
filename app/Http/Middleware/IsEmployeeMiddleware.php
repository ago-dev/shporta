<?php

namespace App\Http\Middleware;

use App\Enum\UserRoleEnum;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Application|ResponseFactory|Response
     */
    public function handle(Request $request, Closure $next)
    {
        // This validation assumes you can access role from User Model
        if ($request->user()->role->name != UserRoleEnum::EMPLOYEE->value) {
            return response(view('errors.404'));
        }

        return $next($request);
    }
}
