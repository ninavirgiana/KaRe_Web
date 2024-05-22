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
    public $timestamps = true;
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'email_user',
        'password_user',
        'alamat_user',
        'notelp_user',
        'foto_user',
        'level_user',
        // 'id_user',

    ];


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
    public function formulir_kunjungan()
    {
        return $this->hasMany(FormulirKunjungan::class, 'id_user', 'id_user');
    }
// public function kunjungan()
// {
//     return $this->hasOne(Kunjungan::class);
// }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'id_user', 'id_user');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_user', 'id_user');
    }
    public function verifikasi()
    {
        return $this->hasOne(Verifikasi::class, 'id_user', 'id_user');
    }
    public function tabungan()
    {
        return $this->hasMany(Tabungan::class, 'id_user', 'id_user');
    }

}
