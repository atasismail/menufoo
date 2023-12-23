<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iyzico;
use Iyzipay\Options;

class DefaultController extends Controller
{
    public function log()
    {
        $data = Log::get();


        return view('admin.log.index', compact('data'));
    }
    public function index()
    {




        $data['admin'] = User::Where('rol', 'admin')->count();
        $data['tema_sayisi'] = Tema::count();
        $data['user'] = User::Where('rol', 'yonetim')->count();
        $data['tel'] = User::Where('tel_active', '1')->count();
        $data['ban'] = User::Where('active', '0')->count();
        $data['log'] = Log::Where('ok', '0')->count();


        return view('admin.default.index ', compact('data'));
    }
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
