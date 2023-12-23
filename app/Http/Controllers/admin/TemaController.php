<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tema;
use Illuminate\Http\Request;
use Iyzipay\Model\Subscription\SubscriptionProduct;
use Iyzipay\Options;
use Iyzipay\Request\Subscription\SubscriptionCreateProductRequest;
use Iyzipay\Request\Subscription\SubscriptionDeleteProductRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdateProductRequest;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tema::with('plan')->get();
        return view('admin.tema.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tema.create ');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // dd($request);
        $request->validate([
            'tema_adi' => 'required',
            'tema_aciklama' => 'required',
            'kapak_resmi' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'tema_resimleri' => 'required',
            'tema_resimleri.*' => 'image|mimes:jpg,jpeg,png'

        ]);

        $file_name =   dosyayukle($request->kapak_resmi, '/cdn/tema/');

        $resimler = [];

        foreach ($request->tema_resimleri as $image) {
            $dosya_name =    dosyayukle($image, '/cdn/tema/');
            array_push($resimler, $dosya_name);
        }
        $firma = Tema::create(
            [
                "tema_adi" => $request->tema_adi,
                "tema_aciklama" => $request->tema_aciklama,
                "kapak_resmi" => $file_name,
                "tema_resimleri" => implode(",", $resimler),
                "referans_kod" => uniqid() . "-" . uniqid(),
            ]
        );

        if ($firma) {
            return redirect(route('tema.index'))->with('success', 'Ürün Ekleme Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');

        // $options = new Options();
        // $options->setApiKey(env('IYZICO_API_KEY'));
        // $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        // $options->setBaseUrl(env('IYZICO_BASE_URL'));


        // $gonder = new SubscriptionCreateProductRequest();
        // $gonder->setLocale(env('IYZICO_DIL'));
        // $gonder->setName($request->tema_adi);

        // $sonuc = SubscriptionProduct::create($gonder, $options);



        // if ($sonuc->getStatus() == "success") {
        //     $file_name =   dosyayukle($request->kapak_resmi, '/cdn/tema/');

        //     $resimler = [];

        //     foreach ($request->tema_resimleri as $image) {
        //         $dosya_name =    dosyayukle($image, '/cdn/tema/');
        //         array_push($resimler, $dosya_name);
        //     }
        //     $firma = Tema::create(
        //         [
        //             "tema_adi" => $request->tema_adi,
        //             "tema_aciklama" => $request->tema_aciklama,
        //             "kapak_resmi" => $file_name,
        //             "tema_resimleri" => implode(",", $resimler),
        //             "referans_kod" => $sonuc->getReferenceCode(),
        //         ]
        //     );

        //     if ($firma) {
        //         return redirect(route('tema.index'))->with('success', 'Ürün Ekleme Başarılı');
        //     }
        //     return back()->with('error', 'İşlem Başarısız');
        // } else {
        //     return back()->with('error', 'Ürün Ekleme Başarısız' . $sonuc->getErrorMessage());
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $tema = Tema::where('id', $id)->first();

        return view('admin.tema.edit')->with('tema', $tema);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $tema = Tema::Where('id', $id)->get('referans_kod');
        $request->validate([
            'tema_adi' => 'required',
            'tema_aciklama' => 'required',
            'kapak_resmi' => 'image|mimes:jpg,jpeg,png|max:2048',
            'tema_resimleri.*' => 'image|mimes:jpg,jpeg,png'
        ]);

        // if ($request->eski_isim != $request->tema_adi) {

        //     $options = new Options();
        //     $options->setApiKey(env('IYZICO_API_KEY'));
        //     $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        //     $options->setBaseUrl(env('IYZICO_BASE_URL'));
        //     $gonder = new SubscriptionUpdateProductRequest();
        //     $gonder->setLocale(env('IYZICO_DIL'));
        //     $gonder->setProductReferenceCode($tema[0]->referans_kod);
        //     $gonder->setName($request->tema_adi);
        //     SubscriptionProduct::update($gonder, $options);
        // }

        if ($request->hasFile('kapak_resmi')) {

            $file_name =   dosyayukle($request->kapak_resmi, '/cdn/tema/');
            $path = public_path('cdn/tema/' . $request->old_file);
            if (file_exists($path)) {
                @unlink($path);
            }
        } else {
            $file_name = $request->old_file;
        }



        if ($request->hasFile('tema_resimleri')) {
            $resimler = [];
            foreach ($request->tema_resimleri as $image) {
                $dosya_name =    dosyayukle($image, '/cdn/tema/');
                array_push($resimler, $dosya_name);
            }

            $resimleriSil = explode(',', $request->old_file2);

            foreach ($resimleriSil as $sil) {
                $path = public_path('cdn/tema/' . $sil);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }
        } else {
            $resimler = explode(',', $request->old_file2);
        }


        $page = Tema::Where('id', $id)->update(
            [
                "tema_adi" => $request->tema_adi,
                "tema_aciklama" => $request->tema_aciklama,
                "kapak_resmi" => $file_name,
                "tema_resimleri" => implode(",", $resimler)
            ]
        );

        if ($page) {
            return back()->with('success', 'Ürün Güncelleşme Başarılı');
        }
        return back()->with('error', 'Ürün Güncelleşme Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sections = Tema::find(intval($id));
        if ($sections->delete()) {
            echo 1;
            $path = 'cdn/tema/' . $sections->kapak_resmi;
            if (file_exists(public_path($path))) {
                @unlink(public_path($path));
            }
            $resimleriSil = explode(',', $sections->tema_resimleri);
            foreach ($resimleriSil as $sil) {
                $path = public_path('cdn/tema/' . $sil);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }
        }
        echo 0;
        // $sections = Tema::find(intval($id));

        // $options = new Options();
        // $options->setApiKey(env('IYZICO_API_KEY'));
        // $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        // $options->setBaseUrl(env('IYZICO_BASE_URL'));
        // $gonder = new SubscriptionDeleteProductRequest();
        // $gonder->setLocale(env('IYZICO_DIL'));
        // $gonder->setProductReferenceCode($sections->referans_kod);
        // $sonuc = \Iyzipay\Model\Subscription\SubscriptionProduct::delete($gonder, $options);
        // if ($sonuc->getStatus() == "success") {
        //     if ($sections->delete()) {
        //         echo 1;
        //         $path = 'cdn/tema/' . $sections->kapak_resmi;
        //         if (file_exists(public_path($path))) {
        //             @unlink(public_path($path));
        //         }
        //         $resimleriSil = explode(',', $sections->tema_resimleri);
        //         foreach ($resimleriSil as $sil) {
        //             $path = public_path('cdn/tema/' . $sil);
        //             if (file_exists($path)) {
        //                 @unlink($path);
        //             }
        //         }
        //     }
        //     echo 0;
        // } else {
        //     echo 0;
        // }
    }
}
