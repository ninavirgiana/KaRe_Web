<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Models\User;

class ProfilController extends Controller
{
    //
    public function index()
{
    $user = auth()->user(); // Mengambil data user yang sedang login

    return view('login.profil', compact('user'));
}
public function create()
    {
        return view('login.profil');
    }

    // Metode untuk menyimpan profil baru
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            
            
        ]);

        $user = new User();
        $user->nama_user = $request->nama_lengkap;
        $user->notelp_user = $request->nomor_telepon;
        $user->alamat_user = $request->alamat;

        

        // Simpan profil baru ke dalam database
        $profil->save();

        return redirect()->route('profil.show', $profil->id)->with('success', 'Profil berhasil dibuat!');
    }

    public function edit(){
        $user = auth()->user(); // Mengambil data user yang sedang login

    return view('login.profil', compact('user'));
}
    
    public function update(){
        $request->validate([
        'nama_lengkap' => 'required|',
        'nomor_telepon' => 'required',
        'alamat' => 'required'
    ]);
        $user = User::findOrFail($id); // Mengambil data user yang sedang login
        $user->nama_user = $request->input('nama_lengkap');
        $user->notelp_user = $request->input('nomor_telepon');
        $user->alamat_user = $request->input('alamat');
        $user->save();

        return redirect()->route('login.profil')->with('success', 'Profil berhasil diperbarui.');
    }




    public function updateProfileImage(Request $request)
{
    $this->validate($request, [
        'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
    ]);

   

    return back()->with('success', 'Foto profil berhasil diperbarui!');
}

public function removeProfileImage(Request $request)
{
    

    return back()->with('success', 'Foto profil berhasil dihapus!');
}

    
}
