<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabungan;
use App\Models\User;


class TabunganController extends Controller
{
    
    //
    // public function index(Request $request, $id_user)
    public function index()
    {
        // $user = User::find($id_user);
        $tabungan = Tabungan::orderBy('id_user', 'asc')->simplePaginate(4);
        
        // $tabungan = $user->tabungan()->get();
        return view('login.tabungan', compact('tabungan'));
    }
}
