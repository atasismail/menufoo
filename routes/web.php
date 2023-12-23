<?php

use Illuminate\Support\Facades\Route;


// Route::get('/x', function () {

//     // Artisan::call('config:clear');
//     // Artisan::call('cache:clear');


//     Artisan::call('migrate');
//     Artisan::call('db:seed --class=UserSeeder');
//     return 'Başarılı Bitti';
// });



Route::get('/', function () {
    return view('tanitim.index');
});

Route::get('{firma_adi}/{user_id}/{tema_id}/{masa_adi}', [App\Http\Controllers\TemaController::class, 'index'])
    ->where(['user_id' => '[0-9]+', 'tema_id' => '[0-9]+', 'masa_adi'])
    ->name('tema.index');
Route::get('{firma_adi}/{user_id}/{tema_id}/{masa_adi}/json', [App\Http\Controllers\TemaController::class, 'indexJson'])
    ->where(['user_id' => '[0-9]+', 'tema_id' => '[0-9]+', 'masa_adi'])
    ->name('tema.indexJson');

Route::post('bildirim', [App\Http\Controllers\TemaController::class, 'bildirimgonder'])->name('bildirimgonder');
Route::post('garson/bildirim', [App\Http\Controllers\TemaController::class, 'garsonBildirimgonder'])->name('garsonBildirimgonder');

// ADMİN PANEL
Route::prefix('admin')->group(
    function () {
        Route::get('/login', [App\Http\Controllers\admin\LoginController::class, 'login'])->name('login')->middleware("login");
        Route::middleware(['login'])->group(function () {
            Route::post('/login', [App\Http\Controllers\admin\DefaultController::class, 'logincontrol'])->name('admin.logincontrol');
        });
        Route::get('/logout', [App\Http\Controllers\admin\DefaultController::class, 'logout'])->name('admin.logout');

        Route::middleware(['admin'])->group(function () {
            Route::get('/', [App\Http\Controllers\admin\DefaultController::class, 'index'])->name('admin.index');
            Route::get('admin', [App\Http\Controllers\admin\UserController::class, 'admin'])->name('admin');
            Route::resource('user', App\Http\Controllers\admin\UserController::class);
            Route::get('user-ban', [App\Http\Controllers\admin\UserController::class, 'ban'])->name('user.ban');
            Route::get('TemaEkle/{id}', [App\Http\Controllers\admin\UserController::class, 'userTemaEkle'])->name('user.temaEkle');
            Route::get('TemaEkleForm/{id}', [App\Http\Controllers\admin\UserController::class, 'userTemaEkleForm'])->name('user.temaEkleForm');
            Route::post('TemaPostEkle', [App\Http\Controllers\admin\UserController::class, 'userTemaPostEkle'])->name('user.temaPostEkle');

            Route::get('TemaDuzenleForm/{id}', [App\Http\Controllers\admin\UserController::class, 'userTemaDuzenleForm'])->name('user.temaDuzenleForm');
            Route::post('TemaPostDuzenle/{id}', [App\Http\Controllers\admin\UserController::class, 'userTemaPostDuzenle'])->name('user.temaPostDuzenle');

            Route::get('user/panel/{token}', [App\Http\Controllers\admin\UserController::class, 'panel'])->name('user.panel');
            Route::get('log', [App\Http\Controllers\admin\DefaultController::class, 'log'])->name('log');

            Route::get('bildirim', [App\Http\Controllers\admin\UserController::class, 'bildirim'])->name('bildirim');
            Route::post('bildirim', [App\Http\Controllers\admin\UserController::class, 'bildirimgonder'])->name('bildirimgonder');
            Route::get('ayarlar', [App\Http\Controllers\admin\DefaultController::class, 'ayarlar'])->name('ayarlar');
            Route::post('ayarlar', [App\Http\Controllers\admin\DefaultController::class, 'ayarlarpost'])->name('ayarlarpost');

            Route::resource('/tema', App\Http\Controllers\admin\TemaController::class);
            Route::resource('/plan', App\Http\Controllers\admin\PlanController::class);
            Route::resource('/data', App\Http\Controllers\admin\DataController::class);
        });
    }
);



// YÖNETİM
Route::prefix("yonetim")->group(
    function () {
        // Yönetim Google Giriş
        Route::get('google', [App\Http\Controllers\Yonetim\AuthController::class, 'redirect'])->name('googele-auth');
        Route::get('google/callback', [App\Http\Controllers\Yonetim\AuthController::class, 'callback']);
        // Yönetim Login Giriş
        Route::middleware(['yonetim_login'])->group(function () {
            Route::get('/login', [App\Http\Controllers\Yonetim\AuthController::class, 'login'])->name('yonetim.login');
            Route::post('/loginControll', [App\Http\Controllers\Yonetim\AuthController::class, 'logincontrol'])->name('yonetim.logincontrol');
            Route::get('/kayit', [App\Http\Controllers\Yonetim\AuthController::class, 'kayit'])->name('yonetim.kayit');
            Route::post('/kayit', [App\Http\Controllers\Yonetim\AuthController::class, 'kayitOl'])->name('yonetim.kayitcontrol');
            Route::get('/sifirla', [App\Http\Controllers\Yonetim\AuthController::class, 'sifirla'])->name('yonetim.sifirla');
        });

        Route::get('/logout', [App\Http\Controllers\Yonetim\AuthController::class, 'logout'])->name('yonetim.logout');


        Route::get('/telefon', [App\Http\Controllers\Yonetim\AuthController::class, 'telefon'])->name('telefon');
        Route::get('/bilgi', [App\Http\Controllers\Yonetim\AuthController::class, 'bilgi'])->name('bilgi');
        Route::post('/bilgi', [App\Http\Controllers\Yonetim\AuthController::class, 'bilgiGuncelle'])->name('bilgi.guncelle');
        Route::post('/dogrula', [App\Http\Controllers\Yonetim\AuthController::class, 'smsislem']);
        Route::post('/smsDogrula', [App\Http\Controllers\Yonetim\AuthController::class, 'smsDogrula']);



        Route::middleware(['Yonetim'])->group(function () {
            Route::get('/', [App\Http\Controllers\Yonetim\DefaultController::class, 'index'])->name('yonetim.index');

            Route::resource('/firma', App\Http\Controllers\Yonetim\FirmaController::class);

            Route::get('/temalar', [App\Http\Controllers\Yonetim\TemalarController::class, 'index'])->name('temalar.index');
            Route::post('/temalar/odemeSayfa', [App\Http\Controllers\Yonetim\TemalarController::class, 'odemeSayfa'])->name('temalar.odemeSayfa');
            Route::post('/temalar/odeme', [App\Http\Controllers\Yonetim\TemalarController::class, 'odeme'])->name('temalar.odeme');
            Route::get('/temalar/{id}', [App\Http\Controllers\Yonetim\TemalarController::class, 'show'])->where('id', '[0-9]+')->name('temalar.show');



            Route::get('/temalarim', [App\Http\Controllers\Yonetim\TemalarimController::class, 'index'])->name('temalarim.index');
            Route::get('/temalarim/tema/{id}', [App\Http\Controllers\Yonetim\TemalarimController::class, 'tema'])->name('temalarim.tema');
            Route::get('/temalarim/temayaBagla/{id}', [App\Http\Controllers\Yonetim\TemalarimController::class, 'temayaBagla'])->name('temalarim.firmayaBagla');
            Route::get('/temalarim/bagla', [App\Http\Controllers\Yonetim\TemalarimController::class, 'bagla'])->name('temalarim.bagla');
            Route::post('/temalarim/baglat/{id}', [App\Http\Controllers\Yonetim\TemalarimController::class, 'FirmayaBagla'])->name('temalarim.firmayaBaglat');

            Route::get('/faturalarim/index', [App\Http\Controllers\Yonetim\FaturalarimController::class, 'index'])->name('faturalarim.index');
            Route::get('/faturalarim/abonelikler', [App\Http\Controllers\Yonetim\FaturalarimController::class, 'abonelikler'])->name('faturalarim.abonelikler');
            Route::get('/faturalarim/islemler', [App\Http\Controllers\Yonetim\FaturalarimController::class, 'islemler'])->name('faturalarim.islemler');
            Route::get('/faturalarim/iptalEt/{referans_kod}', [App\Http\Controllers\Yonetim\FaturalarimController::class, 'iptalEtSayfasi'])->name('faturalarim.iptalEtSayfasi');
            Route::post('/faturalarim/iptalEt/{referans_kod}', [App\Http\Controllers\Yonetim\FaturalarimController::class, 'iptalEt'])->name('faturalarim.iptalEt');
            // Route::resource('/faturalarim', App\Http\Controllers\Yonetim\FaturalarimController::class);

            Route::resource('/urun', App\Http\Controllers\Yonetim\UrunController::class);
            Route::post('/fiyat/duzelt/{id}', [App\Http\Controllers\Yonetim\FiyatController::class, 'duzelt']);
            Route::resource('/fiyat', App\Http\Controllers\Yonetim\FiyatController::class);
            Route::resource('/qrcode', App\Http\Controllers\Yonetim\QrcodeController::class);
            Route::post('/masa/duzelt/{id}', [App\Http\Controllers\Yonetim\MasaController::class, 'duzelt']);
            Route::resource('/masa', App\Http\Controllers\Yonetim\MasaController::class);

            Route::resource('/garson', App\Http\Controllers\Yonetim\GarsonController::class);

            Route::post('/kategori/duzelt/{id}', [App\Http\Controllers\Yonetim\KategoriController::class, 'duzelt']);
            Route::resource('/kategori', App\Http\Controllers\Yonetim\KategoriController::class);

            Route::get('/secenek/{id}', [App\Http\Controllers\Yonetim\SecenekController::class, 'index'])->name('secenek.index');
            Route::post('/secenek/onYaziEkle', [App\Http\Controllers\Yonetim\SecenekController::class, 'onYaziEkle'])->name('secenek.onYaziEkle');
            Route::post('/secenek/onYaziSil', [App\Http\Controllers\Yonetim\SecenekController::class, 'onYaziSil'])->name('secenek.onYaziSil');
            Route::post('/secenek/onYaziDuzenle', [App\Http\Controllers\Yonetim\SecenekController::class, 'onYaziDuzenle'])->name('secenek.onYaziDuzenle');
            Route::post('/secenek/yazi_hizi', [App\Http\Controllers\Yonetim\SecenekController::class, 'yazi_hizi'])->name('secenek.yazi_hizi');
            Route::post('/secenek/yazi_silme_hizi', [App\Http\Controllers\Yonetim\SecenekController::class, 'yazi_silme_hizi'])->name('secenek.yazi_silme_hizi');
            Route::post('/secenek/yazi_silme_bekleme', [App\Http\Controllers\Yonetim\SecenekController::class, 'yazi_silme_bekleme'])->name('secenek.yazi_silme_bekleme');
            Route::post('/secenek/yazi_dongu', [App\Http\Controllers\Yonetim\SecenekController::class, 'yazi_dongu'])->name('secenek.yazi_dongu');
            Route::post('/secenek/renk', [App\Http\Controllers\Yonetim\SecenekController::class, 'renk'])->name('secenek.renk');
        });
    }
);
