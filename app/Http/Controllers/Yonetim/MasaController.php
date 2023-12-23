<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Garson;
use App\Models\Masa;
use App\Models\Temalarim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Temalarim::with('tumKategoriler')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $islem = Masa::create(
                [
                    "tema_id" => $request->id,
                    "masa_adi" => ucfirst(str_replace(' ', '', $request->masa_adi)),
                    'sira' => $request->sira,

                ]
            );
            if ($islem) {
                return ["durum" => "basarili", "id" => $islem->id];
            } else {
                return 'basaririz';
            }
        } else {
            return "eklenmedi";
        }
    }

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
            $data = Temalarim::with('masa')->find($id);
            $masa = $data->masa;

            return view('yonetim.components.temalarim.masa.masa', compact('masa', 'id'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function duzelt(Request $request)
    {

        $data = Temalarim::with('tumKategoriler')->find($request->id);

        if ($data->user_id == Auth::user()->id) {


            $islem = Masa::Where('id', $request->editId)->update(
                [
                    "masa_adi" => ucfirst(str_replace(' ', '', $request->masaAdi)),
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $data = Temalarim::with('tumKategoriler')->find($id);

        if ($data->user_id == Auth::user()->id) {

            $sayi = 1;
            foreach ($request->sira as $key => $value) {
                $masa = Masa::where('tema_id', $id)->Where('id', $value)->first();
                $masa->sira = $sayi;
                $masa->save();
                $sayi++;
            }

            return "basarili";
        } else {
            return "duzenlenmedi";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $data = Temalarim::with('tumKategoriler')->find($id);

        if ($data->user_id == Auth::user()->id) {

            $islem = Masa::where('tema_id', $id)->Where('id', $request->id)->delete();
            if ($islem) {
                $garson = Garson::where('tema_id', $id)->Where('masa_id', 'like', "%$request->id%")->first();
                if ($garson) {
                    $masalarDizisi = explode('-', $garson->masa_id);
                    $masalarDizisi = array_diff($masalarDizisi, [$request->id]);
                    $garson->masa_id = implode('-', $masalarDizisi);
                    $garson->save();
                }
                return 'basarili';
            } else {
                return 'basaririz';
            }
        } else {
            return "duzenlenmedi";
        }
    }
}
