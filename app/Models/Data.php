<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'sektor',
        'urun_resmi',
        'urun_adi',
        'urun_icerik',
        'fiyat',
        'ek_ad',
        'ek_icerik',
        'sira',
    ];
}
