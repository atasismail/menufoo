<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;


    protected $fillable = [
        "log_adi",
        'log_aciklama',
        'dosya_adi',
        'satir_numarasi',
        'ok',
    ];
}
