<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // dd($request);
        // dump($request);
        // dd($request->path());
        // dd($request->expectsJson());
        if ($request->expectsJson()) {
            return route('login');
            // return '/api/unauthorized';
        }
        // return route($request->path());
    }
}
