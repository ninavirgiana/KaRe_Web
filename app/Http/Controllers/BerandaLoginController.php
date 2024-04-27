<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Tabungan;
use App\Models\Tabungan;


use Illuminate\Http\Request;

class BerandaLoginController extends Controller
{
    //
    public function index()
    {
        $tabungan = Tabungan::orderBy('id_tabungan', 'asc')->get();
        return view('login.berandalogin', compact('tabungan'));

        // return view('login.berandalogin');
    }
}
