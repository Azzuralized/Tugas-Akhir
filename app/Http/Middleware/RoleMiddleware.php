<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->type === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized'); // Modify the error message as per your requirement
    }
}
