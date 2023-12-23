<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garson extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema_id',
        'garson_adi',
        'garson_id',
        'masa_id',
        'token'
    ];
}
