<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Tabungan;
use App\Models\Tabungan;
use App\Models\FormulirKunjungan;
use App\Models\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FormulirKunjunganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BerandaLoginController extends Controller
{
    
    

    private function getDataKunjungan()
    {
        return app()->make(FormulirKunjunganController::class)->getDataTanggaldiTerima(
            null,
            'get_kalender',
            null,
            ['nama_kunjungan', 'tujuan_kunjungan', 'namainstansi_kunjungan', 'tgl_kunjungan'],
            ['nama_kunjungan', 'tujuan_kunjungan', 'namainstansi_kunjungan', 'tgl_kunjungan']
        );
    }

    public function index()
{
    // $user = Auth::user();
    $userId = Auth::id();
    if (!$userId) {
        return abort(401);
    }

    // Ambil data tabungan
    $tabungan = Tabungan::orderBy('id_tabungan', 'asc')->get();

    // Menghitung total berat sampah untuk pengguna yang sedang masuk
    $totalBeratSampah = Tabungan::where('id_user', $userId)
                                ->sum('beratsampah_tabungan');

    $dataKunjungan = FormulirKunjungan::select('nama_kunjungan', 'tujuan_kunjungan', 'namainstansi_kunjungan', 'tgl_kunjungan')->where('status_kunjungan','diterima')->get();
    // Gunakan $dataKunjungan untuk mengakses data kunjungan

    return view('login.berandalogin', compact('tabungan', 'dataKunjungan', 'totalBeratSampah'));
}



}