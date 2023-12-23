<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.default.login');
    }
    public function logincontrol(Request $request)
    {
        $request->flash();
        $formcontrol = $request->only('email', 'password');
        $remember = $request->has('beni_hatirla') ? true : false;
        if (Auth::attempt($formcontrol, $remember)) {
            return redirect()->intended(route('admin.index'));
        } else {
            return back()->with('error', 'Hatalı Kullanıcı adı veya şifre');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Güvenli Çıkış Yapıldı');
    }
}
