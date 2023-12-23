<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Temalarim;
use App\Models\Urun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrunController extends Controller
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
            $data = Temalarim::with('tumKategorilerGetir')->find($id);
            $kategoriler = $data->tumKategorilerGetir;

            return view('yonetim.components.temalarim.urun.create', compact('kategoriler', 'id'));
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
                'kategori_id' => 'required',
                'urun_resmi' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'urun_icerik' => 'required',
                'urun_adi' => 'required',
                'fiyat' => 'required',
                'sira' => 'required',
            ]);



            $resim = uniqid() . '.' . $request->urun_resmi->getClientOriginalExtension();
            $request->urun_resmi->move(public_path('cdn/images/urunler/'), $resim);



            $islem = Urun::create(
                [
                    "tema_id" => $id,
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
                return redirect(route('urun.show', $id))->with('success', 'İşlem Başarılı');
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

            $data = Temalarim::with('tumUrunler')->find($id);
            $urun = $data->tumUrunler;

            return view('yonetim.components.temalarim.urun.urun', compact('urun', 'id'));
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $urun = Urun::find($id) ?? false;
        if ($urun) {

            $user = User::find(Auth::user()->id);
            $data = $user->tema;

            $kontrol = false;
            foreach ($data as $deger) {
                if ($deger->id == $urun->tema_id) {
                    $kontrol = true;
                    break;
                }
            }

            if ($kontrol) {
                $data = Temalarim::with('tumKategorilerGetir')->find($urun->tema_id);
                $kategoriler = $data->tumKategorilerGetir;
                return view('yonetim.components.temalarim.urun.edit', compact('kategoriler', 'urun'));
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

        $urun = Urun::find($id) ?? false;
        if ($urun) {

            $user = User::find(Auth::user()->id);
            $data = $user->tema;

            $kontrol = false;
            foreach ($data as $deger) {
                if ($deger->id == $urun->tema_id) {
                    $kontrol = true;
                    break;
                }
            }

            if ($kontrol) {


                $request->validate([
                    'kategori_id' => 'required',
                    'urun_icerik' => 'required',
                    'urun_adi' => 'required',
                    'fiyat' => 'required',
                    'sira' => 'required',
                ]);


                if ($request->hasFile('urun_resmi')) {
                    $request->validate([
                        'urun_resmi' => 'image|mimes:jpg,jpeg,png,svg,webp|max:2048',
                    ]);


                    $resim = dosyayukle($request->urun_resmi, '/cdn/images/urunler/');
                    $path = public_path('cdn/images/urunler/' . $request->old_file);
                    if (file_exists($path)) {
                        @unlink($path);
                    }

                    $urunler = Urun::Where('id', $id)->update(
                        [
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


                    if ($urunler) {


                        return back()->with('success', 'İşlem Başarılı');
                    }
                    return back()->with('error', 'İşlem Başarısız');
                } else {
                    $urunler = Urun::Where('id', $id)->update(
                        [
                            "kategori_id" => $request->kategori_id,
                            'urun_adi' => $request->urun_adi,
                            'urun_icerik' => $request->urun_icerik,
                            'fiyat' => number_format($request->fiyat, 2),
                            'ek_ad' => $request->ek_ad,
                            'ek_icerik' => $request->ek_icerik,
                            'sira' => $request->sira,
                        ]
                    );

                    if ($urunler) {
                        return back()->with('success', 'İşlem Başarılı');
                    }
                    return back()->with('error', 'İşlem Başarısız');
                }
            } else {
                return back()->with('error', 'İşlem Başarısız');
            }
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $urun = Urun::find($id) ?? false;

        if ($urun) {

            $user = User::find(Auth::user()->id);
            $data = $user->tema;

            $kontrol = false;
            foreach ($data as $deger) {
                if ($deger->id == $urun->tema_id) {
                    $kontrol = true;
                    break;
                }
            }

            if ($kontrol) {
                $sections = Urun::find(intval($id));
                if ($sections->delete()) {
                    echo 1;
                    $path = 'cdn/images/urunler/' . $sections->urun_resmi;
                    if (file_exists(public_path($path))) {
                        @unlink(public_path($path));
                    }
                }
                echo 0;
            }
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }
}
