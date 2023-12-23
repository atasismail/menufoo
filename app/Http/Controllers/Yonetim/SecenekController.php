<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Secenek;
use App\Models\Temalarim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecenekController extends Controller
{
    function index($id)
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
            $data = Temalarim::with('secenek')->find($id);
            $secenek = $data->secenek;

            return view('yonetim.components.temalarim.secenek.secenek', compact('secenek', 'id'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    function onYaziEkle(Request $request)
    {

        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();

            if ($veri === null) {


                $islem = Secenek::create(
                    [
                        "tema_id" => $request->id,
                        "metinler" => $request->onYazi,
                        "yazi_hizi" => "20",
                        "yazi_silme_hizi" => "20",
                        "yazi_silme_bekleme" => "1000",
                        "yazi_dongu" => "1"
                    ]
                );
                if ($islem) {
                    return   "ok";
                } else {
                    return 'basaririz';
                }
            } else {
                $metin = $data->secenek[0]->metinler;
                if ($metin == null) {
                    $islem = $veri->update(
                        [
                            "metinler" => $request->onYazi,
                        ]
                    );
                } else {
                    $seceneklerDizisi = explode('-', $metin);
                    array_push($seceneklerDizisi, $request->onYazi);

                    $islem = $veri->update(
                        [
                            "metinler" => implode('-', $seceneklerDizisi),
                        ]
                    );
                }


                if ($islem) {

                    return   "ok";
                } else {
                    return 'basaririz';
                }
            }
        } else {
            return "eklenmedi";
        }
    }

    function onYaziSil(Request $request)
    {


        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $metin = $data->secenek[0]->metinler;
            $seceneklerDizisi = explode('-', $metin);
            $seceneklerDizisi =  array_diff($seceneklerDizisi, [$request->onYazi]);


            $islem = $veri->update(
                [
                    "metinler" => implode('-', $seceneklerDizisi),
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }

    function onYaziDuzenle(Request $request)
    {
        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $metin = $data->secenek[0]->metinler;
            $seceneklerDizisi = explode('-', $metin);
            $seceneklerDizisi =  array_diff($seceneklerDizisi, [$request->onYazi]);


            $islem = $veri->update(
                [
                    "metinler" => implode('-', $seceneklerDizisi),
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }

    function yazi_hizi(Request $request)
    {

        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $islem = $veri->update(
                [
                    "yazi_hizi" => $request->yazi_hizi,
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }

    function yazi_silme_hizi(Request $request)
    {

        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $islem = $veri->update(
                [
                    "yazi_silme_hizi" => $request->yazi_silme_hizi,
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }

    function yazi_silme_bekleme(Request $request)
    {

        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $islem = $veri->update(
                [
                    "yazi_silme_bekleme" => $request->yazi_silme_bekleme,
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }
    function yazi_dongu(Request $request)
    {

        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $islem = $veri->update(
                [
                    "yazi_dongu" => $request->yazi_dongu == true ? "1" : "0",
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }
    function renk(Request $request)
    {

        $data = Temalarim::with('secenek')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $veri = Secenek::where('tema_id', $request->id)->first();


            $islem = $veri->update(
                [
                    "color_text" => $request->color_text,
                    "hex_renk" => $request->hex_renk,
                    "ust_kutu_renk" => $request->ust_kutu_renk,
                    "garson_buton_renk" => $request->garson_buton_renk,
                ]
            );
            if ($islem) {

                return   "ok";
            } else {
                return 'basaririz';
            }
        }
    }
}
