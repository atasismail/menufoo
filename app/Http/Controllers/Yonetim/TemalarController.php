<?php

namespace App\Http\Controllers\yonetim;


use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tema;
use App\Models\Temalarim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Iyzipay\Model\Subscription\SubscriptionCreateCheckoutForm;
use Iyzipay\Options;
use Iyzipay\Request\Subscription\SubscriptionCreateCheckoutFormRequest;


class TemalarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tema::all();

        return view('yonetim.components.temalar.index')->with('data', $data);
    }

    public function odemeSayfa(Request $request)
    {

        $plan = Plan::where('referans_kod', $request->referans_kod,)->first();

        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));

        if ($request->periyot == "SINIRSIZ") {
            $istek = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
            $istek->setLocale(\Iyzipay\Model\Locale::TR);
            $istek->setConversationId("123456789");
            $istek->setPrice("1");
            $istek->setPaidPrice($plan->fiyat);
            $istek->setCurrency(\Iyzipay\Model\Currency::TL);
            $istek->setBasketId("B67832");
            $istek->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
            $istek->setCallbackUrl(route('temalar.odeme', ['referans_kod' => $plan->referans_kod]));
            $istek->setEnabledInstallments(array(1));

            $buyer = new \Iyzipay\Model\Buyer();
            $buyer->setId(uniqid());
            $buyer->setName(Auth::user()->name);
            $buyer->setSurname(Auth::user()->surname);
            $buyer->setGsmNumber("+90" . Auth::user()->tel_no);
            $buyer->setEmail(Auth::user()->email);
            $buyer->setIdentityNumber(Auth::user()->tc_no);
            $buyer->setLastLoginDate(Carbon::now()->format("Y-m-d H:i:s"));
            $buyer->setRegistrationDate(Carbon::parse(Auth::user()->created_at)->format("Y-m-d H:i:s"));
            $buyer->setRegistrationAddress(Auth::user()->adres);
            $buyer->setIp(request()->ip());
            $buyer->setCity(Auth::user()->il);
            $buyer->setCountry("Turkey");
            // $buyer->setZipCode("34732");

            $istek->setBuyer($buyer);
            $shippingAddress = new \Iyzipay\Model\Address();
            $shippingAddress->setContactName(Auth::user()->displayName);
            $shippingAddress->setCity(Auth::user()->il);
            $shippingAddress->setCountry("Turkey");
            $shippingAddress->setAddress(Auth::user()->adres);
            // $shippingAddress->setZipCode("34742");
            $istek->setShippingAddress($shippingAddress);

            $billingAddress = new \Iyzipay\Model\Address();
            $billingAddress->setContactName(Auth::user()->displayName);
            $billingAddress->setCity(Auth::user()->il);
            $billingAddress->setCountry("Turkey");
            $billingAddress->setAddress(Auth::user()->adres);
            // $billingAddress->setZipCode("34742");
            $istek->setBillingAddress($billingAddress);

            $basketItems = [];
            $firstBasketItem = new \Iyzipay\Model\BasketItem();
            $firstBasketItem->setId(uniqid());
            $firstBasketItem->setName($plan->plan_adi);
            $firstBasketItem->setCategory1("Menu");
            $firstBasketItem->setCategory2("Tema");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            $firstBasketItem->setPrice("1");
            $basketItems[0] = $firstBasketItem;


            $istek->setBasketItems($basketItems);
            $form = \Iyzipay\Model\CheckoutFormInitialize::create($istek, $options);
        } else {

            $istek = new SubscriptionCreateCheckoutFormRequest();
            $istek->setConversationId(Auth::user()->tel_no);
            $istek->setLocale("tr");
            $istek->setPricingPlanReferenceCode($request->referans_kod);
            $istek->setSubscriptionInitialStatus("ACTIVE");
            $istek->setCallbackUrl(route('temalar.odeme', ['referans_kod' => $plan->referans_kod]));
            $customer = new \Iyzipay\Model\Customer();
            $customer->setName(Auth::user()->name);
            $customer->setSurname(Auth::user()->surname);
            $customer->setGsmNumber("+90" . Auth::user()->tel_no);
            $customer->setEmail(Auth::user()->email);
            $customer->setIdentityNumber(Auth::user()->tc_no);
            $customer->setShippingContactName(Auth::user()->displayName);
            $customer->setShippingCity(Auth::user()->il);
            $customer->setShippingCountry("Turkey");
            $customer->setShippingAddress(Auth::user()->adres);
            // $customer->setShippingZipCode("34660");
            $customer->setBillingContactName(Auth::user()->displayName);
            $customer->setBillingCity(Auth::user()->displayName);
            $customer->setBillingCountry("Turkey");
            $customer->setBillingAddress(Auth::user()->adres);
            // $customer->setBillingZipCode("34660");
            $istek->setCustomer($customer);
            $form = SubscriptionCreateCheckoutForm::create($istek, $options);
        }

        return view('yonetim.components.temalar.odeme')->with('form', $form->getCheckoutFormContent());
    }


    public function odeme(Request $request)
    {


        $options = new Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECTRET_KEY'));
        $options->setBaseUrl(env('IYZICO_BASE_URL'));
        $plan = Plan::where('referans_kod', $request->query('referans_kod'),)->first();

        if ($plan->periyot == "SINIRSIZ") {
            $istek = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
            $istek->setLocale(\Iyzipay\Model\Locale::TR);
            $istek->setToken($request->token);
            $veri = \Iyzipay\Model\CheckoutForm::retrieve($istek, $options);
            if ($veri->getStatus() == "success") {

                $temalarim = Temalarim::create(
                    [
                        "user_id" => Auth::user()->id,
                        "tel_no" => Auth::user()->tel_no,
                        'tema_id' => $plan->tema_id,
                        'referans_kod' => $veri->getToken(),
                        'ana_referans_kod' => "1",
                        'urun_referans_kod' => "1",
                        'kisi_referans_kod' => "1",
                        'deneme_gun_sayisi' => "0",
                        'deneme_baslangic_tarihi' =>  Carbon::now()->format("Y-m-d H:i:s"),
                        'deneme_bitis_tarihi' => Carbon::now()->format("Y-m-d H:i:s"),
                        'olusturma_tarihi' => Carbon::now()->format("Y-m-d H:i:s"),
                        'baslangic_tarihi' => Carbon::now()->format("Y-m-d H:i:s"),
                        'periyot' => $plan->periyot,
                        'plan_adi' => $plan->plan_adi,


                    ]

                );

                if ($temalarim) {
                    return redirect(route('temalarim.index'))->with('success', 'Tema Başarıyla Alındı');
                } else {
                    return redirect(route('temalarim.index'))->with('error', 'Tema Alımı Başarısız');
                }
            } else {
                return redirect(route('temalarim.index'))->with('error', 'İşlem Başarısız');
            }
        } else {
            $istek = new \Iyzipay\Request\Subscription\RetrieveSubscriptionCreateCheckoutFormRequest();
            $istek->setCheckoutFormToken($request->token);
            $veri = \Iyzipay\Model\Subscription\RetrieveSubscriptionCheckoutForm::retrieve($istek, $options);

            if ($veri->getStatus() == "success") {

                $temalarim = Temalarim::create(
                    [
                        "user_id" => Auth::user()->id,
                        "tel_no" => Auth::user()->tel_no,
                        'tema_id' => $plan->tema_id,
                        'referans_kod' => $veri->getReferenceCode(),
                        'ana_referans_kod' => $veri->getParentReferenceCode(),
                        'urun_referans_kod' => $veri->getPricingPlanReferenceCode(),
                        'kisi_referans_kod' => $veri->getCustomerReferenceCode(),
                        'deneme_gun_sayisi' => $veri->getTrialDays(),
                        'deneme_baslangic_tarihi' =>  date('Y-m-d H:i:s', $veri->getTrialStartDate() / 1000),
                        'deneme_bitis_tarihi' => date('Y-m-d H:i:s', $veri->getTrialEndDate() / 1000),
                        'olusturma_tarihi' => date('Y-m-d H:i:s', $veri->getCreatedDate() / 1000),
                        'baslangic_tarihi' => date('Y-m-d H:i:s', $veri->getStartDate() / 1000),
                        'periyot' => $plan->periyot,
                        'plan_adi' => $plan->plan_adi,

                    ]

                );

                if ($temalarim) {
                    return redirect(route('temalarim.index'))->with('success', 'Tema Başarıyla Alındı');
                } else {
                    return redirect(route('temalarim.index'))->with('error', 'Tema Alımı Başarısız');
                }
            } else {
                return redirect(route('temalarim.index'))->with('error', 'İşlem Başarısız');
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = Tema::with('plan')->where('id', $id)->first();
        return view('yonetim.components.temalar.show')->with('data', $data);
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
