<?php

namespace App\Http\Controllers;

use App\Models\FormulirKunjungan;
class DetailPengajuanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel PengajuanKunjungan
       
        $data = FormulirKunjungan::simplePaginate(1);
        // $data = FormulirKunjungan::table('kunjungan')->simplePaginate(15);
        return view('login.detailpengajuan', compact('data'));
    }

    
}
