<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Temalarim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Options;

class FaturalarimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abonelikler = Temalarim::where('tel_no', Auth::user()->tel_no)->where('periyot', '!=', 'SINIRSIZ')->count();

        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));


        $islemSayisi = 0;
        $istek = new \Iyzipay\Request\ReportingPaymentDetailRequest();
        $istek->setPaymentConversationId(Auth::user()->tel_no);
        $islem = \Iyzipay\Model\ReportingPaymentDetail::create($istek, $options);


        foreach ($islem->getPayments() as $sayi) {
            if ($sayi->paymentRefundStatus == 'NOT_REFUNDED') {
                $islemSayisi++;
            }
        };

        return view('yonetim.components.faturalarim.index', compact('abonelikler', 'islemSayisi'));
    }


    /**
     * Display the specified resource.
     */
    public function islemler()
    {


        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));


        $istek = new \Iyzipay\Request\ReportingPaymentDetailRequest();
        $istek->setPaymentConversationId(Auth::user()->tel_no);

        $islemler = \Iyzipay\Model\ReportingPaymentDetail::create($istek, $options);
        // $islemler->getPayments();
        return view('yonetim.components.faturalarim.islemler', compact('islemler'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function abonelikler()
    {

        $abonelikler = Temalarim::where('tel_no', Auth::user()->tel_no)->get();

        return view('yonetim.components.faturalarim.abonelikler', compact('abonelikler'));
    }

    public function iptalEtSayfasi(Request $request)
    {

        return view('yonetim.components.faturalarim.iptalEtSayfasi')->with('referans_kod', $request->referans_kod);
    }

    public function iptalEt(Request $request)
    {

        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));
        // ABONELİĞİ İPTAL ET
        $istek = new \Iyzipay\Request\Subscription\SubscriptionCancelRequest();
        $istek->setLocale("tr");
        // abone referans kodu
        $istek->setSubscriptionReferenceCode($request->referans_kod);
        $result = \Iyzipay\Model\Subscription\SubscriptionCancel::cancel($istek, $options);

        if ($result->getStatus() == "success") {
            return "success";
        } else {
            return "Daha Önceden İptal Edilmiş";
        }
    }
}
