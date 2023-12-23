<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['tema_id', 'kategori_adi', 'kategori_id', 'sira'];


    public function kategoriler()
    {

        return $this->hasMany(Kategori::class, 'kategori_id', 'id')->orderBy('sira', 'asc');
    }
}
