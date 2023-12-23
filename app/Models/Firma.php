<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'firma_adi',
        'firma_logo',
        'numara',


    ];

}
