<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Data::get();
        return view('admin.data.urun', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $request->validate([
            'sektor' => 'required',
            'urun_resmi' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urun_icerik' => 'required',
            'urun_adi' => 'required',
            'fiyat' => 'required',
            'sira' => 'required',
        ]);



        $resim = uniqid() . '.' . $request->urun_resmi->getClientOriginalExtension();
        $request->urun_resmi->move(public_path('cdn/images/urunler/'), $resim);



        $islem = Data::create(
            [
                "sektor" => $request->sektor,
                "kategori_id" => $request->kategori_id,
                'urun_resmi' => $resim,
                'urun_adi' => $request->urun_adi,
                'urun_icerik' => $request->urun_icerik,
                'fiyat' => number_format($request->fiyat, 2),
                'ek_ad' => $request->ek_ad,
                'ek_icerik' => $request->ek_icerik,
                'sira' => $request->sira,
            ]
        );

        if ($islem) {
            return redirect(route('data.index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error', 'Ürün Eklenirken Hata Oldu');
        }
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

        $urun = Data::find($id);
        return view('admin.data.edit', compact('urun'));
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
