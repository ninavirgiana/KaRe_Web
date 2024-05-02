<?php

namespace App\Http\Controllers;

use App\Models\FormulirKunjungan;
class DetailPengajuanController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel PengajuanKunjungan
        $data = FormulirKunjungan::orderBy('id_user', 'asc')->simplePaginate(3);
        return view('login.detailpengajuan', compact('data'));
    }

    
}
