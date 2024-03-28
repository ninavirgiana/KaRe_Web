<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk'; 
    protected $fillable = [
        'id_produk',
        'nama_produk',
        'foto_produk',
        'harga_produk',
        'deskripsi_produk',
        'stok_produk',
        

    ];

    public $timestamps = true;
}
