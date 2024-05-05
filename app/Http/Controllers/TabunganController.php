<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;




class TabunganController extends Controller
{
    
   
public function index(Request $request)
{
    // Dapatkan ID pengguna yang sedang login
    $userId = Auth::id();

    // Pastikan ID pengguna yang login ada
    if (!$userId) {
        return abort(401); // Unauthorized jika pengguna tidak ada
    }

    // Ambil data tabungan berdasarkan ID pengguna yang sedang login
    $tabungan = Tabungan::where('id_user', $userId)
        ->orderBy('created_at', 'asc') // Misalnya diurutkan berdasarkan tanggal pembuatan terbaru
        ->simplePaginate(4); // Paginasi data

    // Tampilkan data tabungan ke view
    return view('login.tabungan', compact('tabungan'));
}

    
}
