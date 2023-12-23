<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Temalarim extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tel_no',
        'firma_id',
        'tema_id',
        'telegram_token',
        'referans_kod',
        'ana_referans_kod',
        'urun_referans_kod',
        'kisi_referans_kod',
        'deneme_gun_sayisi',
        'deneme_baslangic_tarihi',
        'deneme_bitis_tarihi',
        'olusturma_tarihi',
        'baslangic_tarihi',
        'bitis_tarihi',
        'periyot',
        'plan_adi',
    ];
    public function firma()
    {
        return $this->belongsTo(Firma::class, 'firma_id', 'id');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id', 'id');
    }

    public function tumKategoriler()
    {
        return $this->hasMany(Kategori::class, 'tema_id', 'id')->whereNull('kategori_id')->orderBy('sira', 'asc');
    }

    public function tumKategorilerGetir()
    {
        return $this->hasMany(Kategori::class, 'tema_id', 'id')->whereNotNull('kategori_id')->orderBy('sira', 'asc');
    }
    public function tumUrunler()
    {
        return $this->hasMany(Urun::class, 'tema_id', 'id')->orderBy('sira', 'asc');
    }
    public function tumQrcode()
    {
        return $this->hasMany(Qrcode::class, 'tema_id', 'id');
    }
    public function masa()
    {
        return $this->hasMany(Masa::class, 'tema_id', 'id')->orderBy('sira', 'asc');
    }

    public function garson()
    {
        return $this->hasMany(Garson::class, 'tema_id', 'id');
    }

    public function secenek()
    {
        return $this->hasMany(Secenek::class, 'tema_id', 'id');
    }
}
