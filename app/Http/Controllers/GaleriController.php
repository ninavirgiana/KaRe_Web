<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;


class GaleriController extends Controller
{
    
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('id_kegiatan', 'asc')->cursorPaginate(6);
        return view('frontend.galeri', compact('kegiatan'));
        
    }
}
