<?php

// File: app/Models/FormulirKunjungan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulirKunjungan extends Model
{
    public $timestamps = true;
    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';

    protected $fillable = [
        'nama_kunjungan',
        'alamat_kunjungan',
        'namainstansi_kunjungan',
        'nohp_kunjungan',
        'tgl_kunjungan',
        'tujuan_kunjungan',
        'status_kunjungan',
        'jumlah_kunjungan',
        // 'alasan_status_kunjungan',
        'id_user',

    ];
    // public function table()
    // {
    //     return new Builder($this->table);
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
}
