<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Yonetim
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guest() && Auth::user()->rol == "yonetim") {
            if (Auth::getUser()->tel_active == 0) {
                return redirect(route('telefon'))->with('error', 'Lütfen Telefon Numaranızı Doğrulayınız');
            } else {
                return $next($request);
                // if (Auth::getUser()->tc_no == null) {

                //     return redirect(route('bilgi'))->with('error', 'Lütfen Bilgilerinizi Giriniz');
                // } else {
                //     return $next($request);
                // }
            }
        } else {
            Auth::logout();
            return redirect(route('yonetim.login'))->with('error', 'Erişim Yetkiniz Yok');
        }


        return redirect(route('yonetim.login'));
    }
}
