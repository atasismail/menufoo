<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema_id',
        'referans_kod',
        'plan_adi',
        'fiyat',
        'fiyat_cinsi',
        'periyot',
        'periyot_sure_sayisi',
        'deneme_gun_sayisi',
        'sira_numarasi',

    ];
}
