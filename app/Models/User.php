<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "displayName",
        'name',
        'surname',
        'il',
        'ilce',
        'adres',
        'tc_no',
        'user_file',
        'userId',
        'email',
        'apiToken',
        'password',
        'rol',
        'tel_no',
        'tel_dogrulama_kod',
        'tel_active'
    ];
    public function firma()
    {
        return $this->hasMany(Firma::class, 'user_id', 'id');
    }
    public function tema()
    {
        return $this->hasMany(Temalarim::class, 'user_id', 'id')
            ->with(['firma', 'tema']);
    }


    public function temalarim()
    {
        return $this->hasMany(Temalarim::class, 'user_id', 'id')
            ->with(['firma', 'tumKategoriler', 'tumKategorilerGetir', 'tumUrunler', 'secenek']);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
