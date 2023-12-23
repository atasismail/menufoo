<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------ş------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bildirim', function () {
    // return bildirimgonder("muhhammed", " Masa 6 \n ------\n Siparişleri \n Makarna 2 Adet = 220₺  \n Coca Kola 1 Adet  = 35₺ \n Ekmek 5 Adet = 52 ₺\n Makarna 2 Adet = 220₺  \n Coca Kola 1 Adet  = 35₺ \n Ekmek 5 Adet = 52 ₺\n Makarna 2 Adet = 220₺  \n Coca Kola 1 Adet  = 35₺ \n Ekmek 5 Adet = 52 ₺\n Makarna 2 Adet = 220₺  \n Coca Kola 1 Adet  = 35₺ \n Ekmek 5 Adet = 52 ₺\n Makarna 2 Adet = 220₺  \n Coca Kola 1 Adet  = 35₺ \n Ekmek 5 Adet = 52 ₺\n Makarna 2 Adet = 220₺  \n Coca Kola 1 Adet  = 35₺ \n Ekmek 5 Adet = 52 ₺\n", 'cIndZdeCu7bhPEW_u5fPfY:APA91bEW4EebChg4DoKd-2fAo5FLZ3bB1jxoiK3JpVnSEFBWAh-XBFoHR46oI15n9AyHFzSNE2JQDPpDJXNrm0kUszyaizWazRj3tVRxFo-MxLPU-yA6fPkz3Vtoj5RIl9duNM9N8yA1');
    return bildirimgonder();
});
