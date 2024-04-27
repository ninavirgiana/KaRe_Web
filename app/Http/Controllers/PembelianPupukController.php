<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class PembelianPupukController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::orderBy('id_produk', 'asc')->paginate(5);
        return view('frontend.pembelianpupuk', compact('produk'));
        
    }
}
