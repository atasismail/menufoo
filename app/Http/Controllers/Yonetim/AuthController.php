<?php

namespace App\Http\Controllers\Yonetim;

use App\Events\Sms;
use App\Http\Controllers\Controller;
use App\Listeners\SmsGonder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    // NORMAL GİRİŞ
    public function login()
    {
        return view('yonetim.auth.login');
    }

    public function kayit()
    {
        return view('yonetim.auth.kayit');
    }
    public function sifirla()
    {
        return view('yonetim.auth.sifirla');
    }
    function kayitOl(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|Min:6',
            'password_confirmation' => 'required'
        ]);


        $apiToken = Str::random(60);

        if ($request->hasFile('user_file')) {
            $request->validate([
                'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            ]);


            $file_name = $request->file('user_file')->store('images/kullanici');
        } else {
            $file_name = null;
        }


        $user = User::create(
            [
                "name" => $request->name,
                "surname" => $request->surname,
                "displayName" => $request->name . " " . $request->surname,
                "email" => $request->email,
                "rol" => "yonetim",
                "user_file" => $file_name,
                "apiToken" => $apiToken,
                "password" => Hash::make($request->password),
            ]
        );

        if ($user) {
            return redirect(route('yonetim.login'))->with('success', 'Kayıt İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }


    public function logincontrol(Request $request)
    {
        $request->flash();
        $formcontrol = $request->only('email', 'password');
        $remember = $request->has('beni_hatirla') ? true : false;
        if (Auth::attempt($formcontrol, $remember)) {
            return redirect()->intended(route('yonetim.index'));
        } else {
            return back()->with('error', 'email veya şifre Hatalı ');
        }
    }

    // GOOGLE GİRİŞ
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUSer = User::where('email', $user->email)->first();
            if ($findUSer) {

                Auth::login($findUSer);
                return redirect(route('yonetim.index'))->with('success', 'Giriş Başarılı');
            } else {

                $url = $user->avatar;
                $file_name = uniqid() . '.jpg';
                $response = Http::get($url);

                if ($response->successful()) {
                    $imageData = $response->body();
                    $filename = 'cdn/images/kullanicilar/' . $file_name;
                    file_put_contents($filename, $imageData);
                } else {
                    $file_name = "";
                }





                $apiToken = Str::random(60);

                $newUSer = User::create([
                    "displayName" => $user->name,
                    "name" => $user->user['given_name'],
                    "surname" => $user->user['family_name'],
                    "email" => $user->email,
                    "user_file" => $file_name,
                    "userId" => $user->id,
                    "apiToken" => $apiToken,
                    "rol" => "yonetim"

                ]);
                Auth::login($newUSer);

                return redirect(route('yonetim.index'))->with('success', 'Giriş Başarılı');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('yonetim.login'))->with('success', 'Güvenli Çıkış Yapıldı');
    }


    // TELEFON KONTROL

    public function telefon()
    {
        return view("yonetim.auth.telefon");
    }

    public function smsislem(Request $request)
    {
        User::where('tel_no', $request->phone_number)->where('tel_active', "0")->update(['tel_no' => null]);

        $sayi = rand(1000, 9999);
        $telcontrol = User::where('tel_no', $request->phone_number)->where('tel_active', 1)->first();

        if ($telcontrol) {
            return "numaraVar";
        } else {
            $bilgi = smsGonder($request->phone_number, $sayi . " koduyla Menufoo doğrulama işlemi yapabilirsiniz, Eğer Kod göndermediyseniz lütfen kodu paylaşmayınız.");



            $usermail = Auth::user()->email;
            $user = User::where(['email' => $usermail])->first();
            if ($bilgi['data'] == 0) {
                $userok = $user->update(
                    [
                        "tel_no" => $request->phone_number,
                        "tel_dogrulama_kod" => $sayi
                    ]
                );
                if ($userok) {
                    return "basarili";
                }
            } else {
                $log = logOlustur($bilgi['data'], $bilgi['error'], __FILE__, __LINE__);
                if ($log) {
                    return "systemError";
                }
            }
        }
    }

    public function smsDogrula(Request $request)
    {
        $usermail = Auth::user()->email;
        $user = User::where(['email' => $usermail])->first();
        if (Auth::user()->tel_dogrulama_kod == $request->sms_code) {
            $userok = $user->update(
                [
                    "tel_active" => "1"
                ]
            );
            if ($userok) {
                return "basarili";
            }
        } else {
            return "basarisiz";
        }
    }
    public function bilgi()
    {
        return view('yonetim.auth.bilgi');
    }
    public function bilgiGuncelle(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'il' => 'required',
            'ilce' => 'required',
            'adres' => 'required',
            'tc_no' => 'required|tcno',

        ]);

        $user = User::find(Auth::user()->id);
        $islem = $user->update(
            [
                "name" => $request->name,
                "surname" => $request->surname,
                "displayName" => $request->name . " " . $request->surname,
                "adres" => $request->adres,
                "il" => $request->il,
                "ilce" => $request->ilce,
                "tc_no" => $request->tc_no,


            ]
        );
        if ($islem) {
            return redirect(route('yonetim.index'))->with('success', 'Hoşgeldiniz');
        } else {

            return back()->with('error', 'İşlem Başarısız');
        }
    }
}
