<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Kegiatan;
use App\Models\Kegiatan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // return view('home');
        // $kegiatan = Kegiatan::orderBy('id_kegiatan', 'asc')->paginate(5);
        $kegiatan = Kegiatan::latest()->take(3)->get();
        return view('home', compact('kegiatan'));
        
    }
}
