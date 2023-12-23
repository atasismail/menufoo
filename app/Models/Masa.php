<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masa extends Model
{
    use HasFactory;
    protected $fillable = [
        'tema_id',
        'masa_adi',
        'sira',
    ];
}
