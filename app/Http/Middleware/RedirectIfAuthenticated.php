<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard'); // Admin ke dashboard
            } else {
                return redirect()->route('home.index'); // User biasa ke halaman user
            }
        }

        return $next($request);
    }
}