<?php

use App\Models\Log;

function dosyayukle($dosya, $yol)
{
    $dosya_adi = uniqid() . '.' . $dosya->getClientOriginalExtension();
    $dosya->move(public_path($yol), $dosya_adi);
    return $dosya_adi;
}
function smsGonder($phone_number, $mesaj)
{
    $netgsm_usercode = env('NETGSM_USERCODE');
    $netgsm_password = env('NETGSM_PASSWORD');
    $netgsm_redirect = env('NETGSM_REDIRECT');
    $xml = '<?xml version="1.0"?><mainbody><header><usercode>' . $netgsm_usercode . '</usercode><password>' . $netgsm_password . '</password><msgheader>' . $netgsm_usercode . '</msgheader></header><body><msg><![CDATA[' . $mesaj . ']]></msg><no>' . $phone_number . '</no></body></mainbody>';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $netgsm_redirect);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result = curl_exec($ch);
    $xml = simplexml_load_string($result);
    $data = $xml->main->code;
    $error = $xml->main->error;

    return ['data' => $data, 'error' => $error];
}


function logOlustur($data, $error, $file, $line)
{
    $log = Log::create(
        [
            "log_adi" => $data,
            "log_aciklama" => $error,
            "dosya_adi" => $file,
            "satir_numarasi" => "Log veren kod " . $line . " numaralı satırda."
        ]

    );
    return $log;
}


function TCNOKontrol($TCNO)
{
    $tek = 0;
    $cift = 0;
    $sonuc = 0;
    $TCToplam = 0;
    $hatali = array(11111111110, 22222222220, 33333333330, 44444444440, 55555555550, 66666666660, 7777777770, 88888888880, 99999999990);

    if (strlen($TCNO) != 11) {
        return false;
    }
    if (!is_numeric($TCNO)) {
        return false;
    }
    if ($TCNO[0] == '0') {
        return false;
    }

    for ($i = 0; $i < 9; $i += 2) {
        $tek += (int) $TCNO[$i];
    }
    for ($i = 1; $i < 8; $i += 2) {
        $cift += (int) $TCNO[$i];
    }

    $tek = $tek * 7;
    $sonuc = $tek - $cift;
    if ($sonuc % 10 != (int) $TCNO[9]) {
        return false;
    }

    for ($i = 0; $i < 10; $i++) {
        $TCToplam += (int) $TCNO[$i];
    }

    if ($TCToplam % 10 != (int) $TCNO[10]) {
        return false;
    }

    if (in_array($TCNO, $hatali)) {
        return false;
    }

    return true;
}

function bildirimgonders($title, $body, $topics)
{


    $fields = array(
        'to' => '/topic/' . $topics,
        'notification'  => [
            'title'         => $title,
            'body'          => $body,
            'sound'         => 'default',
            'badge'         => '1',
            'icon'          => 'https://via.assets.so/img.jpg?w=200&h=200&tc=white&bg=red&t=masa6',
            "sound" => "default",
            "color" => "#ff0000",
            // "ticker" => "merhaba",
            "priority" => "high",
            "click_action" => "MyHome()",
            "default_sound" => true,
        ]
    );

    $headers = array(
        'Authorization: key=AAAA3XamPEw:APA91bG8NTfaR8tcRjcabsCUO-6Op5mjbcbHe36wsSq-LsxIt6ejPTvrX2pXwV8ZGr3w9X1N97pmhTHl_VwXFrvm5kJKdeRcPVFPoc_ihXjy40IqoGHxcyasKXGQX9Pv3IZYSsHS6FJc',
        'Content-Type: application/json'
    );

    // send notification
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($result, true);
    return  $response;
}

function bildirimgonder($title, $body, $topic)
{

    // $SERVER_API_KEY = 'AAAA3XamPEw:APA91bG8NTfaR8tcRjcabsCUO-6Op5mjbcbHe36wsSq-LsxIt6ejPTvrX2pXwV8ZGr3w9X1N97pmhTHl_VwXFrvm5kJKdeRcPVFPoc_ihXjy40IqoGHxcyasKXGQX9Pv3IZYSsHS6FJc';

    // $data = [
    //     "registration_ids" => [$topic],
    //     "notification" => [
    //         "title" => $title,
    //         "body" => $body,
    //         "content_available" => true,
    //         "priority" => "high",
    //     ]
    // ];
    // $dataString = json_encode($data);

    // $headers = [
    //     'Authorization: key=' . $SERVER_API_KEY,
    //     'Content-Type: application/json',
    // ];

    // $ch = curl_init();

    // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    // $response = curl_exec($ch);

    // dd($response);
}
