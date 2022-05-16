<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IsCustomerMiddleware
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
        if ($request->user()->role != "Customer") {
            return response()->json(['error' => 'you are not a customer!'], 403);
        }

        return $next($request);
    }
}
