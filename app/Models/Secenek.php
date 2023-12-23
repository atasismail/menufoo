<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secenek extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema_id',
        'metinler',
        'yazi_hizi',
        'yazi_silme_hizi',
        'yazi_silme_bekleme',
        'yazi_dongu',
        'color_text',
        'hex_renk',
        'ust_kutu_renk',
        'garson_buton_renk'
    ];
}
