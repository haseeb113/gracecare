<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanAccessPatient
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
        $role = auth()->user()->role;

        if (in_array($role, ['admin', 'reception'])) {
            return $next($request);
        }
    
        abort(403);
    }
}
