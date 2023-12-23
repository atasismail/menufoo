<?php

namespace App\Http\Controllers\yonetim;

use App\Http\Controllers\Controller;
use App\Models\Firma;
use App\Models\Tema;
use App\Models\Temalarim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemalarimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $data = $user->tema;
        $veri = Tema::count();

        return view('yonetim.components.temalarim.index', compact('data', 'veri'));
    }
    public function tema(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $data = $user->tema;
        $kontrol = false;
        foreach ($data as $deger) {
            if ($deger->id == $request->id) {
                $kontrol = true;
                break;
            }
        }

        if ($kontrol) {

            $id = $request->id;

            return view('yonetim.components.temalarim.tema')->with('id', $id);
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }
    public function temayaBagla(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $data = $user->tema;
        $kontrol = false;
        foreach ($data as $deger) {
            if ($deger->id == $request->id) {
                $kontrol = true;
                break;
            }
        }


        if ($kontrol) {

            $id = $request->id;

            $data = Temalarim::find($request->id);
            $firmalar = Firma::where('user_id', Auth::user()->id)->get();

            return view('yonetim.components.temalarim.firmaBagla', compact('data', 'firmalar', 'id'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    function FirmayaBagla(Request $request)
    {


        $user = User::find(Auth::user()->id);
        $data = $user->tema;
        $kontrol = false;
        foreach ($data as $deger) {
            if ($deger->id == $request->id) {
                $kontrol = true;
                break;
            }
        }


        if ($kontrol) {
            $firma = Firma::find($request->firma)->Where('user_id', Auth::user()->id)->get();

            if ($firma) {

                $islem = Temalarim::Where('id', $request->id)->update(
                    [
                        "firma_id" => $request->firma,
                    ]
                );

                if ($islem) {
                    return redirect(route('temalarim.index'))->with('infoSuccess', 'Firma Temaya Bağlatıldı');


                }

            } else {
                return back()->with('error', 'İşlem Başarısız');
            }
            // dd($request->request);
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }
    public function bagla()
    {
        $user = User::find(Auth::user()->id);
        $data = $user->tema;
        return view('yonetim.components.temalarim.bagla', compact('data'));
    }
    public function firma(string $id)
    {
        $data = Tema::with('plan')->where('id', $id)->first();
        return view('yonetim.components.temalar.show')->with('data', $data);
    }
}
