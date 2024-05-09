<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Tabungan;
use App\Models\Tabungan;
use App\Models\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BerandaLoginController extends Controller
{
    //
    public function index()
    {
        // $user = User::find($id);
        // $user = Auth::user();
        // $user = User::findOrFail($id);


        $tabungan = Tabungan::orderBy('id_tabungan', 'asc')->get();
        return view('login.berandalogin', compact('tabungan'));

        // return view('login.berandalogin');
    }

    // public function viewProfile(){
    //     $user = User::find(auth()->user()->id); 
    //     // $user = auth()->user(); // Mengambil data user yang sedang login

    //     return view('login.berandalogin', compact('user'));

    // }
}
