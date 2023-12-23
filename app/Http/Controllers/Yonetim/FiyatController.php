<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Temalarim;
use App\Models\Urun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiyatController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find(Auth::user()->id);
        $data = $user->tema;

        $kontrol = false;
        foreach ($data as $deger) {
            if ($deger->id == $id) {
                $kontrol = true;
                break;
            }
        }


        if ($kontrol) {

            $data = Temalarim::with('tumUrunler')->find($id);
            $urun = $data->tumUrunler;

            return view('yonetim.components.temalarim.fiyat.urun', compact('urun', 'id'));

        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function duzelt(Request $request)
    {


        $data = Temalarim::with('tumKategoriler')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $islem = Urun::Where('id', $request->editId)->update(
                [
                    "fiyat" => number_format($request->editFiyat, 2),
                ]
            );
            if ($islem) {
                return 'basarili';
            } else {
                return 'basaririz';
            }

        } else {
            return "duzenlenmedi";
        }
    }

}
