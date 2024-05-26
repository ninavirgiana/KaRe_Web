<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use views\frontend\kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {      
         return view ('frontend.kegiatan');
        
    }

}
