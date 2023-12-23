<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Tema;
use App\Models\Temalarim;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = User::all()->where('rol', 'yonetim');
        return view('admin.users.index ', compact('data'));
    }
    public function panel(Request $request)
    {

        $findUSer = User::where('apiToken', $request->token)->first();
        if ($findUSer) {
            Auth::login($findUSer);
            return redirect(route('yonetim.index'))->with('success', 'Giriş Başarılı');
        }
    }
    /**
     * Show the form for creating a new resource.
     */



    public function ban()
    {
        $data['user'] = User::where('active', "0")->get();
        return view('admin.users.banindex ', compact('data'));
    }
    public function admin()
    {
        $data['user'] = User::where('rol', "admin")->get();
        return view('admin.users.adminindex ', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $apiToken = Str::random(60);
        $control = User::where('email', $request->email)->first();
        $control2 = User::where('userId', $request->userId)->first();
        if ($control && $control2) {
            return $control->apiToken;
        } else {
            if ($request->displayName != null && $request->email != null && $request->userId != null) {
                $user = User::create(
                    [
                        "displayName" => $request->displayName,
                        "email" => $request->email,
                        "userId" => $request->userId,
                        "apiToken" => $apiToken,
                    ]
                );
                if ($user) {
                    return $apiToken;
                }
            } else {
                return "başarısız";
            }

            return response()->json('error', 'İşlem Başarısız');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::with('temalarim', 'firma')->where('id', $id)->first();
        return view('admin.users.show')->with('user', $user);
    }

    public function userTemaEkle($id)
    {
        $data['user'] = User::with('temalarim')->where('id', $id)->first();
        return view('admin.users.temaEkleTable ', compact('data', 'id'));
    }
    public function userTemaEkleForm($id)
    {
        $temalar = Tema::all();
        return view('admin.users.temaEkleForm ', compact('id', 'temalar'));
    }
    public function userTemaDuzenleForm($id)
    {
        $temalar = Tema::all();
        $temaBilgi = Temalarim::find($id);

        return view('admin.users.temaDuzenleForm ', compact('id', 'temalar', 'temaBilgi'));
    }

    public function userTemaPostEkle(Request $request)
    {
        $user  = User::find($request->id);


        $temalarim = Temalarim::create(
            [
                "user_id" => $user->id,
                "tel_no" => $user->tel_no,
                'tema_id' => $request->tema_id,
                'telegram_token' => $request->telegram_token,
                'referans_kod' => uniqid(),
                'ana_referans_kod' => uniqid(),
                'urun_referans_kod' => uniqid(),
                'kisi_referans_kod' => uniqid(),
                'deneme_gun_sayisi' => "0",
                'deneme_baslangic_tarihi' =>  Carbon::now(),
                'deneme_bitis_tarihi' => Carbon::now(),
                'olusturma_tarihi' => Carbon::now(),
                'baslangic_tarihi' => Carbon::now(),
                'periyot' => "0",
                'plan_adi' => "Sınırsız",

            ]

        );

        if ($temalarim) {
            return redirect(route('user.temaEkle', $request->id))->with('success', 'Tema Başarıyla Eklendi');
        } else {
            return redirect(route('user.temaEkle', $request->id))->with('error', 'Tema Ekleme Başarısız');
        }
    }

    function userTemaPostDuzenle(Request $request, $id)
    {


        $temalarim = Temalarim::Where('id', $id)->update(
            [

                'tema_id' => $request->tema_id,
                'telegram_token' => $request->telegram_token,
                'active' => $request->active,

            ]

        );

        if ($temalarim) {
            return redirect(route('user.temaEkle', $request->id))->with('success', 'Tema Başarıyla Eklendi');
        } else {
            return redirect(route('user.temaEkle', $request->id))->with('error', 'Tema Ekleme Başarısız');
        }
    }
}
