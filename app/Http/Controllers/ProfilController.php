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
        // $user = user::user();
        $user = User::orderBy('id_user', 'asc');
        return view('login.profil', compact('user'));
        
        // $user = User::orderBy('id_user', 'asc');
        // return view('login.profil',compact('user') );

    }
    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     $user->name = $request->input('name');
    //     $user->alamat = $request->input('alamat');
    //     $user->tgl_lahir = $request->input('tgl_lahir');
    //     $user->no_hp = $request->input('no_hp');
    //     $user->jenis_kelamin = $request->input('jenis_kelamin');

    //     $user->save();

    //     return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    // }
    public function updateProfileImage(Request $request)
{
    $this->validate($request, [
        'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Sesuaikan aturan validasi sesuai kebutuhan
    ]);

   

    return back()->with('success', 'Foto profil berhasil diperbarui!');
}

public function removeProfileImage(Request $request)
{
    

    return back()->with('success', 'Foto profil berhasil dihapus!');
}

    
}
