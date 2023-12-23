<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Temalarim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastSira = Kategori::where('tema_id', $request->id)->orderBy('sira', 'desc')->first();
        $data = Temalarim::with('tumKategoriler')->find($request->id);


        if ($data->user_id == Auth::user()->id) {

            $islem = Kategori::create(
                [
                    "tema_id" => $request->id,
                    "kategori_adi" => $request->kategoriAdi,
                    'kategori_id' => $request->kategori,
                    'sira' => $lastSira ? $lastSira->sira + 1 : 1,
                ]
            );
            if ($islem) {
                return 'basarili';
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

        $data = Temalarim::with('tumKategoriler')->find($id);
        $tumKategoriler = $data->tumKategoriler;
        $veri = $tumKategoriler->load([
            'kategoriler' => function ($query) use ($id) {
                $query->where('tema_id', $id);
            }
        ]);



        return view('yonetim.components.temalarim.kategori', compact('veri', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    public function duzelt(Request $request)
    {

        $data = Temalarim::with('tumKategoriler')->find($request->id);

        if ($data->user_id == Auth::user()->id) {

            $islem = Kategori::Where('id', $request->editId)->update(
                [
                    "kategori_adi" => $request->kategoriAdi,


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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Temalarim::with('tumKategoriler')->find($id);

        if ($data->user_id == Auth::user()->id) {


            foreach ($request->kategoriler as $sira => $veri) {
                Kategori::where('tema_id', $id)->Where('id', $veri['id'])->update([
                    'kategori_id' => $veri['ustKategoriId'],
                    "sira" => $sira,
                ]);

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

            $islem = Kategori::where('tema_id', $id)->Where('id', $request->id)->orWhere('kategori_id', $request->id)->delete();
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
