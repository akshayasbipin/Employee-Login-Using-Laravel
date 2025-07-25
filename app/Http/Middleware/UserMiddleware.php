<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type == 0) {
            return $next($request);
        }

        return redirect()->route('login')->withErrors(['email' => 'Access denied!']);
    }
}
