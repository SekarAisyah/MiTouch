<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class custom
{
    protected $UserRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->UserRepository = $userRepository;
    }

    public function handle($request, Closure $next)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if ($this->UserRepository->authenticate($credentials)) {
            return $next($request);
        }
        //dd('Middleware Works!');
        return redirect('/login');
    }
}
