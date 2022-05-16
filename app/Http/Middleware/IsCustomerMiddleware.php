<?php

namespace App\Http\Middleware;

use App\Enum\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsCustomerMiddleware
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
        // This validation assumes you can access role from User Model
        if ($request->user()->role->name != UserRoleEnum::CUSTOMER->value) {
            return response(view('errors.404'));
        }

        return $next($request);
    }
}
