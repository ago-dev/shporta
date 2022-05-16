<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IsEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // This validation assumes you can access role from User Model
        if ($request->user()->role != "Employee") {
            return response()->json(['error' => 'You are not an employee!'], 403);
        }

        return $next($request);
    }
}
