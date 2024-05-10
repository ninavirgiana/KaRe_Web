<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Mengambil data user yang sedang login
        return view('login.profil', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('login.profil', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required',
            'notelp_user' => 'required',
            'email_user' => 'required',
            'alamat_user' => 'required',
            'foto_user' => 'image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);

        $user = User::findOrFail($id);
        $user->nama_user = $request->input('nama_user');
        $user->notelp_user = $request->input('notelp_user');
        $user->alamat_user = $request->input('alamat_user');
        $user->email_user = $request->input('email_user');
        
        if ($request->hasFile('foto_user')) { 
            $foto = $request->file('foto_user');
            $nama_foto = $user->id_user . '.' . $foto->getClientOriginalExtension();
            $tujuan_upload = 'foto_profil';
            $foto->move($tujuan_upload, $nama_foto);
            $user->foto_user = $nama_foto; 
        }

        // Simpan perubahan profil ke dalam database
        $user->save();

        return redirect()->route('profil', $user->id)->with('success', 'Profil berhasil diperbarui!');
        try{
    } catch (Exception $e) {
        return back()->withInput()->withErrors(['error' => 'Gagal memperbarui profil. Silakan coba lagi.']);
    }}

    

    public function edit()
    {
        $user = auth()->user();
        return view('login.profil', compact('user'));
    }

    public function gantipassword(Request $request)
    {
        $request->validate([
            'passwordsekarang' => 'required',
            'passwordbaru' => [
                'required',
                'regex:/^\S*$/u', 
            ],
        ], [
            'passwordbaru.regex' => 'Password baru tidak boleh mengandung spasi.',
        ]);
        $user = Auth::user();

        if (Hash::check($request->passwordsekarang, $user->password_user)) {
            $user->password_user = Hash::make($request->passwordbaru);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Password lama yang dimasukkan salah');
        }
    }}

