<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tema;
use Illuminate\Http\Request;
use Iyzipay\Model\Subscription\SubscriptionPricingPlan;
use Iyzipay\Options;
use Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionDeletePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionUpdatePricingPlanRequest;

class PlanController extends Controller
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
        $id = $request->query('id');
        return view('admin.tema.plan.create ', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_adi' => 'required',
            'fiyat' => 'required',
            'fiyat_cinsi' => 'required',
            'periyot' => 'required',
            'periyot_sure_sayisi' => 'required',
            'deneme_gun_sayisi' => 'required',
            'urun_id' => 'required',
            'sira_numarasi' => 'required',

        ]);

        $tema = Tema::where('id', $request->urun_id)->first();
        $urun_referans_kod = $tema->referans_kod;
        $plan_adi = $request->plan_adi;
        $fiyat = $request->fiyat;
        $fiyat_cinsi = $request->fiyat_cinsi;
        $periyot = $request->periyot;
        $periyot_sure_sayisi = $request->periyot_sure_sayisi;
        $deneme_gun_sayisi = $request->deneme_gun_sayisi;

        $plan = Plan::create(
            [

                "tema_id" => $request->urun_id,
                "referans_kod" => uniqid() . "-" . uniqid(),
                "plan_adi" => $request->plan_adi,
                "fiyat" => $request->fiyat,
                "fiyat_cinsi" => $request->fiyat_cinsi == "TRY" ? "TL" : $request->fiyat_cinsi,
                "periyot" => $request->periyot,
                "periyot_sure_sayisi" => $request->periyot_sure_sayisi,
                "deneme_gun_sayisi" => $request->deneme_gun_sayisi,
                "sira_numarasi" => $request->sira_numarasi,
            ]
        );



        if ($plan) {
            return redirect(route('plan.show', $request->urun_id))->with('success', 'Plan Ekleme Başarılı');
        }
        return back()->with('error', 'Plan Ekleme  Başarısız');

        // if ($request->periyot == "SINIRSIZ") {

        //     $plan = Plan::create(
        //         [

        //             "tema_id" => $request->urun_id,
        //             "referans_kod" => uniqid() . "-" . uniqid(),
        //             "plan_adi" => $request->plan_adi,
        //             "fiyat" => $request->fiyat,
        //             "fiyat_cinsi" => $request->fiyat_cinsi == "TRY" ? "TL" : $request->fiyat_cinsi,
        //             "periyot" => $request->periyot,
        //             "periyot_sure_sayisi" => $request->periyot_sure_sayisi,
        //             "deneme_gun_sayisi" => $request->deneme_gun_sayisi,
        //             "sira_numarasi" => $request->sira_numarasi,
        //         ]
        //     );



        //     if ($plan) {
        //         return redirect(route('plan.show', $request->urun_id))->with('success', 'Plan Ekleme Başarılı');
        //     }
        //     return back()->with('error', 'Plan Ekleme  Başarısız');
        // } else {
        //     $options = new Options();
        //     $options->setApiKey(env('IYZICO_API_KEY'));
        //     $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        //     $options->setBaseUrl(env('IYZICO_BASE_URL'));

        //     $gonder = new SubscriptionCreatePricingPlanRequest();
        //     $gonder->setLocale(env('IYZICO_DIL'));
        //     $gonder->setConversationId("25468935254");
        //     $gonder->setProductReferenceCode($urun_referans_kod);
        //     $gonder->setName($plan_adi);
        //     $gonder->setPrice($fiyat);
        //     $gonder->setCurrencyCode($fiyat_cinsi);
        //     $gonder->setPaymentInterval($periyot);
        //     $gonder->setPaymentIntervalCount($periyot_sure_sayisi);
        //     $gonder->setTrialPeriodDays($deneme_gun_sayisi);
        //     $gonder->setPlanPaymentType('RECURRING');
        //     $sonuc = SubscriptionPricingPlan::create($gonder, $options);
        //     if ($sonuc->getStatus() == "success") {

        //         $plan = Plan::create(
        //             [

        //                 "tema_id" => $request->urun_id,
        //                 "referans_kod" => $sonuc->getReferenceCode(),
        //                 "plan_adi" => $request->plan_adi,
        //                 "fiyat" => $request->fiyat,
        //                 "fiyat_cinsi" => $request->fiyat_cinsi,
        //                 "periyot" => $request->periyot,
        //                 "periyot_sure_sayisi" => $request->periyot_sure_sayisi,
        //                 "deneme_gun_sayisi" => $request->deneme_gun_sayisi,
        //                 "sira_numarasi" => $request->sira_numarasi,
        //             ]
        //         );



        //         if ($plan) {
        //             return redirect(route('plan.show', $request->urun_id))->with('success', 'Plan Ekleme Başarılı');
        //         }
        //         return back()->with('error', 'Plan Ekleme  Başarısız');
        //     } else {

        //         return back()->with('error', 'Plan Ekleme Başarısız' . $sonuc->getErrorMessage());
        //     }
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('admin.tema.index')->with('data', $data);
        $tema = Tema::with('plan')->where('id', $id)->first();
        $data['plan'] = $tema->plan;
        $data['id'] = $id;

        return view('admin.tema.plan.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = Plan::where('id', $id)->first();
        return view('admin.tema.plan.edit')->with('plan', $plan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $plan = Plan::Where('id', $id)->get('referans_kod');
        $request->validate([
            'plan_adi' => 'required',
            'deneme_gun_sayisi' => 'required',
            'sira_numarasi' => 'required',
        ]);
        $page = Plan::Where('id', $id)->update(
            [
                "plan_adi" => $request->plan_adi,
                "deneme_gun_sayisi" => $request->deneme_gun_sayisi,
                "sira_numarasi" => $request->sira_numarasi,
            ]
        );

        if ($page) {
            return back()->with('success', 'Plan Güncelleşme Başarılı');
        }
        return back()->with('error', 'Plan Güncelleşme Başarısız');

        // $options = new Options();
        // $options->setApiKey(env('IYZICO_API_KEY'));
        // $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        // $options->setBaseUrl(env('IYZICO_BASE_URL'));

        // $gonder = new SubscriptionUpdatePricingPlanRequest();
        // $gonder->setLocale(env('IYZICO_DIL'));
        // $gonder->setPricingPlanReferenceCode($plan[0]->referans_kod);
        // $gonder->setName($request->plan_adi);
        // $gonder->setTrialPeriodDays($request->deneme_gun_sayisi);
        // $sonuc = SubscriptionPricingPlan::update($gonder, $options);


        // if ($sonuc->getStatus() == "success") {
        //     $page = Plan::Where('id', $id)->update(
        //         [
        //             "plan_adi" => $request->plan_adi,
        //             "deneme_gun_sayisi" => $request->deneme_gun_sayisi,
        //             "sira_numarasi" => $request->sira_numarasi,
        //         ]
        //     );

        //     if ($page) {
        //         return back()->with('success', 'Plan Güncelleşme Başarılı');
        //     }
        //     return back()->with('error', 'Plan Güncelleşme Başarısız');
        // } else {
        //     return back()->with('error', 'Plan Güncelleşme Başarısız' . $sonuc->getErrorMessage());
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {



        $sections = Plan::find(intval($id));

        if ($sections->delete()) {
            return back()->with('infoSuccess', 'Plan Başaryla Silindi');
        } else {
            return back()->with('infoError', 'Plan silme Başarısız');
        }

        // $options = new Options();
        // $options->setApiKey(env('IYZICO_API_KEY'));
        // $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        // $options->setBaseUrl(env('IYZICO_BASE_URL'));



        // $gonder = new SubscriptionDeletePricingPlanRequest();
        // $gonder->setPricingPlanReferenceCode($sections->referans_kod);
        // $gonder->setLocale(env('IYZICO_DIL'));
        // $sonuc = SubscriptionPricingPlan::delete($gonder, $options);


        // if ($sonuc->getStatus() == "success") {

        //     if ($sections->delete()) {
        //         return back()->with('infoSuccess', 'Plan Başaryla Silinci');
        //     } else {
        //         return back()->with('infoError', 'Plan silme Başarısız');
        //     }
        // } else {
        //     return back()->with('infoError', ($sonuc->getErrorCode() == "201053" ? "Plana Abone Olan Kullanıcılar Var Bu Planı Silmek İçin Aboneleri Yükselterek veya Aboneleri İptal Ederek Sİlebilirsiniz" : $sonuc->getErrorMessage()));
        // }
    }
}
