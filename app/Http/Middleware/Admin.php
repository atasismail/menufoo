<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guest() && Auth::user()->rol == "admin") {
            return $next($request);
        } else {
            Auth::logout();
            return redirect(route('login'))->with('error', 'Erişim Yetkiniz Yok');
        }


        return redirect(route('Login'));
    }
}
