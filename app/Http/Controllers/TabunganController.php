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
    $userId = Auth::id();

    if (!$userId) {
        return abort(401);
    }

    $tabungan = Tabungan::where('id_user', $userId)
        ->orderBy('created_at', 'asc');

    if ($request->get('search')) {
        $tabungan->where('ketsampah_tabungan', 'LIKE', '%' . $request->get('search') . '%')
        ->orWhere('tgl_tabungan', 'LIKE', '%' . $request->get('search') . '%');
    }

    $tabungan = $tabungan->paginate(4);

    return view('login.tabungan', compact('tabungan', 'request'));
}





    
    
}
