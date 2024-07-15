<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfGuest
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Guest logic here
            return redirect()->route('login')->with('error', 'Please create an account to access this page.');
        }

        return $next($request);
    }
}
