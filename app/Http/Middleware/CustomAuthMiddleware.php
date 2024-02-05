<?php

namespace App\Http\Middleware;

use Closure;

class CustomAuthMiddleware
{
    public function handle($request, Closure $next)
    {
    
        if (auth()->guard('custom')->check()) {
            return $next($request);
        }
        return redirect('/login');
    }
}
