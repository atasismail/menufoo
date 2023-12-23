<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tema extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema_adi',
        'tema_aciklama',
        'kapak_resmi',
        'tema_resimleri',
        'referans_kod',

    ];

    public function plan()
    {
        return $this->hasMany(Plan::class, 'tema_id', 'id')->orderBy('sira_numarasi', 'asc');
    }
}
