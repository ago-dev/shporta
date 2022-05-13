<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() === null)
            return redirect()->route('auth.login');

        $actions = $request->route()->getAction();
        $roles = $actions['roles'] ?? null;

        if ($request->user()->hasAnyRole($roles) || !$roles)
            return $next($request);

        return redirect()->route('auth.login');
    }
}
