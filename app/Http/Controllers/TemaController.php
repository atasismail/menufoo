<?php

namespace App\Http\Controllers;

use App\Models\Firma;
use App\Models\Garson;
use App\Models\Masa;
use App\Models\Temalarim;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TemaController extends Controller
{


    function index(Request $request)
    {
        $user_id = $request->user_id;
        $tema_id = $request->tema_id;
        $masa_adi = $request->masa_adi;

        $data = Temalarim::with('secenek')->find($tema_id);


        $secenek = $data->secenek;

        return view('temalar.1.index', compact('masa_adi', 'user_id', 'tema_id', 'secenek'));
    }

    function indexJson(Request $request)
    {
        $user = User::with(["temalarim"])->where('id', $request->user_id)->get();


        $animasyonYazi = count($user[0]->temalarim[0]->secenek) == 0 ? [""] : explode('-', $user[0]->temalarim[0]->secenek[0]->metinler);

        $tema = $user[0]->temalarim->where('id', $request->tema_id);
        $firma = $tema[0]->firma;
        $firma_adi = $firma->firma_adi;
        $firma_logo = $firma->firma_logo;
        $ustKategori = $tema[0]->tumKategoriler;
        $ustKategoriler = [["name" => "Tüm Kategoriler"]];
        $altKategoriler = [["0" => ["name" => "Tüm Kategoriler"]]];
        $tumUrunler = ["0" => []];
        foreach ($ustKategori as $value) {
            array_push($ustKategoriler, ["name" => $value->kategori_adi]);
        }
        $kategoriler = $tema[0]->tumKategorilerGetir->groupBy('kategori_id');
        $kategoriSayi = 1;
        foreach ($kategoriler as $key => $value) {
            $kategori = [];

            foreach ($value as $key => $veri) {
                $kategori[] = ["name" => $veri->kategori_adi];
            }

            $altKategoriler["i-" . $kategoriSayi] = $kategori;
            $kategoriSayi++;
        }

        $urunler = $tema[0]->tumUrunler->groupBy('kategori_id');
        $kategoriSayisi = 1;
        foreach ($kategoriler as $key1 => $kategoriVeri) {
            $kategori = [];
            $urunSayisi = 0;
            foreach ($kategoriVeri as $key2 => $veri) {
                $kategori += ["i-" . $urunSayisi => []];
                foreach ($urunler as $anahtar => $deger) {
                    if ($veri->id == $anahtar) {
                        $kategori["i-" . $urunSayisi] = $deger;
                    }
                }
                $urunSayisi++;
            }
            $tumUrunler["i-" . $kategoriSayisi] = $kategori;
            $kategoriSayisi++;
        }
        return Response()->json([
            "data" => [
                "firma" => [
                    "firmaAdi" => $firma_adi,
                    "firmaLogo" => $firma_logo,
                    "animasyonluYazilar" => $animasyonYazi,
                    "ustKategoriler" => json_decode(str_replace('i-', "", json_encode($ustKategoriler, true))),
                    "altKategoriler" => json_decode(str_replace('i-', "", json_encode($altKategoriler, true))),
                    "urunler" => json_decode(str_replace('i-', "", json_encode($tumUrunler, true)),),
                ],


            ]
        ]);
    }



    function bildirimGonder(Request $request)
    {

        $tema_id = $request->tema_id;
        $user_id = $request->user_id;
        $masa_adi = ucfirst($request->masa_adi);
        $masa_id = Masa::where('tema_id', $tema_id)->Where('masa_adi', $masa_adi)->first('id');

        $not = $request->not;

        if ($masa_adi == null) {
            echo "no";
        } else {
            $tema = Temalarim::where('user_id', $user_id)->where('tema_id', $tema_id)->first();
            $token = $tema->telegram_token;
            $chatIds = Garson::where('tema_id', $tema_id)->Where('masa_id', 'like', "%$masa_id->id%")->get('garson_id');


            $currentDateTime = new DateTime('now');
            $currentHour = $currentDateTime->format('H');
            $currentMinute = $currentDateTime->format('i');
            $toplam_urun_adeti = 0;
            $toplam_urun_fiyati = 0;
            $message = "🍽️ {$masa_adi} \t \t⏰ $currentHour:$currentMinute \n";
            $message .= "\n\n 📋 Sipariş Detayları: \n";
            $message .= "- - - - - - - - - - - - - - - - - - - - - - \n";
            foreach ($request->fishBilgi as $item) {
                $toplam_urun_adeti += intval($item['adet']);
                $toplam_urun_fiyati += floatval($item['fiyat']);

                $message .= "{$item['urun_ad']} \n";
                $message .= "• Adet: {$item['adet']} • Fiyat: {$item['fiyat']} TL\n";
                $message .= "\n\n";
            }
            $message .= "- - - - - - - - - - - - - - - - - - - - - -\n";
            $message .= "🍽️ Ürün Sayısı: " . $toplam_urun_adeti . " \n";
            $message .= "💵 Toplam Fiyat: " . $toplam_urun_fiyati . "₺ \n";
            if ($not == null || $not == "") {
                $message .= "📝 Müşteri Notu:\n\n";
            } else {
                $message .= "📝 Müşteri Notu:\n   • $not \n\n";
            }
            $message .= "#Tüm{$masa_adi}Göster \n";

            function sendMessage($token, $chatId, $message)
            {
                $url = "https://api.telegram.org/bot$token/sendMessage";
                $params = array(
                    'chat_id' => $chatId,
                    'text' => $message,
                );

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $result = curl_exec($ch);

                // if (curl_errno($ch)) {
                //     echo 'Hata: ' . curl_error($ch);
                // }

                curl_close($ch);
            }
            foreach ($chatIds as $chatId) {
                $result = sendMessage($token, $chatId['garson_id'], $message);
                return "ok";
            }
        }
    }

    function garsonBildirimgonder(Request $request)
    {


        $tema_id = $request->tema_id;
        $user_id = $request->user_id;
        $masa_adi = ucfirst($request->masa_adi);
        $masa_id = Masa::where('tema_id', $tema_id)->Where('masa_adi', $masa_adi)->first('id');

        if ($masa_id->id == null) {
            echo "no";
        } else {
            $tema = Temalarim::where('user_id', $user_id)->where('tema_id', $tema_id)->first();
            $token = $tema->telegram_token;

            $chatIds = Garson::where('tema_id', $tema_id)->Where('masa_id', 'like', "%$masa_id->id%")->get('garson_id');

            $currentDateTime = new DateTime('now');
            $currentHour = $currentDateTime->format('H');
            $currentMinute = $currentDateTime->format('i');


            $message = "⏰ $currentHour:$currentMinute \t $masa_adi Garson İstiyor";


            function sendMessage2($token, $chatId, $message)
            {
                $url = "https://api.telegram.org/bot$token/sendMessage";
                $params = array(
                    'chat_id' => $chatId,
                    'text' => $message,
                );

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $result = curl_exec($ch);

                // if (curl_errno($ch)) {
                //     echo 'Hata: ' . curl_error($ch);
                // }

                curl_close($ch);
            }
            foreach ($chatIds as $chatId) {
                $result = sendMessage2($token, $chatId['garson_id'], $message);
                return "ok";
            }
        }
    }
}
