<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Garson;
use App\Models\Temalarim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarsonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('garson.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $user->tema;

        $kontrol = false;
        foreach ($data as $deger) {
            if ($deger->id == $request->query('id')) {
                $kontrol = true;
                break;
            }
        }


        if ($kontrol) {
            $id = $request->query('id');
            $data = Temalarim::with('masa')->find($id);
            $masa = $data->masa;

            return view('yonetim.components.temalarim.garson.create', compact('masa', 'id'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->query('id');
        $data = Temalarim::with('tumKategoriler')->find($id);
        if ($data->user_id == Auth::user()->id) {
            $request->validate([
                'garson_id' => 'required',
                'masa_id' => 'required',
                'garson_adi' => 'required',

            ]);

            $masa_id = [];
            foreach ($request->masa_id as $veri) {
                array_push($masa_id, $veri);
            }
            $islem = Garson::create(
                [
                    "tema_id" => $id,
                    "garson_id" => $request->garson_id,
                    "garson_adi" => $request->garson_adi,
                    "masa_id" => implode("-", $masa_id),

                ]
            );

            if ($islem) {
                return redirect(route('garson.show', $id))->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('error', 'Ürün Eklenirken Hata Oldu');
            }
        } else {
            return back()->with('error', 'İşlem Başarısız');
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

            $data = Temalarim::with('garson', 'masa')->find($id);
            $garson = $data->garson;
            $masa = $data->masa;
            $masalar = [];
            if (count($garson)) {
                $masa_id = explode("-", $garson[0]->masa_id);

                foreach ($masa as $key => $value_id) {

                    foreach ($masa_id as $key => $value) {

                        if ($value_id->id == $value) {
                            array_push($masalar, $value_id->masa_adi);
                        }
                    }
                }
            }


            return view('yonetim.components.temalarim.garson.garson', compact('garson', 'id', 'masalar'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $garson = Garson::find($id) ?? false;
        if ($garson) {

            $user = User::find(Auth::user()->id);
            $data = $user->tema;

            $kontrol = false;
            foreach ($data as $deger) {
                if ($deger->id == $garson->tema_id) {
                    $kontrol = true;
                    break;
                }
            }

            if ($kontrol) {
                $data = Temalarim::with('masa')->find($garson->tema_id);
                $masa = $data->masa;
                return view('yonetim.components.temalarim.garson.edit', compact('masa', 'garson'));
            } else {
                return back()->with('error', 'İşlem Başarısız');
            }
        } else {
            return back()->with('error', 'İşlem Başarısız2');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $garson = Garson::find($id) ?? false;

        if ($garson) {

            $user = User::find(Auth::user()->id);
            $data = $user->tema;

            $kontrol = false;
            foreach ($data as $deger) {
                if ($deger->id == $garson->tema_id) {
                    $kontrol = true;
                    break;
                }
            }

            if ($kontrol) {


                $request->validate([
                    'garson_adi' => 'required',
                    'garson_id' => 'required',
                    'masa_id' => 'required',
                ]);

                $masa_id = [];
                foreach ($request->masa_id as $veri) {
                    array_push($masa_id, $veri);
                }

                $islem = Garson::Where('id', $id)->update(
                    [
                        "garson_adi" => $request->garson_adi,
                        "garson_id" => $request->garson_id,
                        "masa_id" => implode("-", $masa_id),
                    ]
                );

                if ($islem) {
                    return back()->with('success', 'İşlem Başarılı');
                }
                return back()->with('error', 'İşlem Başarısız');
            }
        } else {
            return back()->with('error', 'İşlem Başarısız2');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $garson = Garson::find($id) ?? false;

        if ($garson) {

            $user = User::find(Auth::user()->id);
            $data = $user->tema;

            $kontrol = false;
            foreach ($data as $deger) {
                if ($deger->id == $garson->tema_id) {
                    $kontrol = true;
                    break;
                }
            }

            if ($kontrol) {
                $sections = Garson::find(intval($id));
                if ($sections->delete()) {
                    echo 1;
                }
                echo 0;
            }
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }
}
