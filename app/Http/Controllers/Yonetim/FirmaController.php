<?php

namespace App\Http\Controllers\yonetim;

use App\Http\Controllers\Controller;
use App\Models\Firma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::with('firma')->where('id', Auth::user()->id)->first();
        return view('yonetim.components.firma.index')->with('data', $data->firma);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('yonetim.components.firma.create ');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'firma_adi' => 'required',
        ]);


        if ($request->hasFile('firma_logo')) {
            $request->validate([
                'firma_logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            ]);

            $file_name = dosyayukle($request->firma_logo, '/cdn/firma/');
        } else {
            $file_name = null;
        }


        $firma = Firma::create(
            [
                "user_id" => Auth::user()->id,
                "firma_adi" => $request->firma_adi,
                "firma_logo" => $file_name,
                'numara' => $request->numara,
            ]
        );

        if ($firma) {
            return redirect(route('firma.index'))->with('success', 'İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::with('firma')->where('id', Auth::user()->id)->first();
        $kontrol = false;
        foreach ($data->firma as $deger) {
            if ($deger->id == $id) {
                $kontrol = true;
                break;
            }
        }


        if ($kontrol) {
            $firma = Firma::where('id', $id)->first();
            return view('yonetim.components.firma.edit')->with('firma', $firma);
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = User::with('firma')->where('id', Auth::user()->id)->first();
        $kontrol = false;
        foreach ($data->firma as $deger) {
            if ($deger->id == $id) {
                $kontrol = true;
                break;
            }
        }

        if ($kontrol) {

            $request->validate([
                'firma_adi' => 'required',
            ]);

            if ($request->hasFile('firma_logo')) {
                $request->validate([
                    'firma_logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',

                ]);

                $file_name = dosyayukle($request->firma_logo, '/cdn/firma/');

                $path = public_path('cdn/firma/' . $request->old_file);
                if (file_exists($path)) {
                    @unlink($path);
                }
            } else {
                $file_name = $request->old_file;
            }

            $page = Firma::Where('id', $id)->update(
                [
                    "user_id" => Auth::user()->id,
                    "firma_adi" => $request->firma_adi,
                    "firma_logo" => $file_name,
                    'numara' => $request->numara,

                ]
            );

            if ($page) {
                return back()->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız');
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = User::with('firma')->where('id', Auth::user()->id)->first();
        $kontrol = false;
        foreach ($data->firma as $deger) {
            if ($deger->id == $id) {
                $kontrol = true;
                break;
            }
        }

        if ($kontrol) {
            $sections = Firma::find(intval($id));
            if ($sections->delete()) {
                echo 1;
                $path = 'cdn/firma/' . $sections->firma_logo;
                if (file_exists(public_path($path))) {
                    @unlink(public_path($path));
                }
            }
            echo 0;
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }
}
