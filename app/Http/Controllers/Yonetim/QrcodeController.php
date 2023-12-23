<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Temalarim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrcodeController extends Controller
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

            return view('yonetim.components.temalarim.qrcode.create', compact('id'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qrcode_size = $request->qrcode_size;
        $qrcode_sayisi = $request->qrcode_sayisi;
        echo $qrcode_size;
        echo $qrcode_sayisi;

        for ($i = 0; $i < $qrcode_sayisi; $i++) {
            echo "";
        }
        // $user = User::find(Auth::user()->id);
        // $data = $user->tema;

        // $kontrol = false;
        // foreach ($data as $deger) {
        //     if ($deger->id == $request->query('id')) {
        //         $kontrol = true;
        //         break;
        //     }
        // }


        // if ($kontrol) {
        //     $id = $request->query('id');
        //     $data = Temalarim::with('tumKategorilerGetir')->find($id);
        //     $kategoriler = $data->tumKategorilerGetir;

        //     return view('yonetim.components.temalarim.urun.create', compact('kategoriler', 'id'));
        // } else {
        //     return back()->with('error', 'İşlem Başarısız');
        // }
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

            $data = Temalarim::with('tumQrcode', 'masa')->find($id);
            $qrcode = $data->tumQrcode;
            $masa = $data->masa;

            return view('yonetim.components.temalarim.qrcode.qrcode', compact('qrcode', 'id', 'masa'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
