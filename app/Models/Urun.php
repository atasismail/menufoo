<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    use HasFactory;


    protected $fillable = [
        'tema_id',
        'kategori_id',
        'urun_resmi',
        'urun_adi',
        'urun_icerik',
        'fiyat',
        'ek_ad',
        'ek_icerik',
        'sira',
    ];
}
