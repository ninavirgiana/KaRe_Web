<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

use App\Models\FormulirKunjungan;
class DetailPengajuanController extends Controller
{

    public function index(Request $request)
{
    // Dapatkan ID pengguna yang login
    $userId = Auth::id();

    if (!$userId) {
        return abort(401); 
    }

    // Ambil data tabungan berdasarkan ID pengguna yang login
    $data = FormulirKunjungan::where('id_user', $userId)
        ->orderBy('created_at', 'asc') 
        ->simplePaginate(5); 

        return view('login.detailpengajuan', compact('data'));
}
}
