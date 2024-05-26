<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email_user', 'password_user');

        // dd($credentials);
        $user = User::where('email_user', $credentials['email_user'])->first();
        if ($user && Hash::check($credentials['password_user'], $user->password_user)) {
            Auth::login($user);
            return redirect()->route('berandalogin');
        } else {
            return redirect()->route('login')->with('error', 'Username atau Password anda salah');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with ('succes', 'Kamu berhasil logout');
    }

    public function register() {
        return view('auth.register');
    }

    
    public function register_post(Request $request)
    {
        $customMessage = [
            'nama_user.required'    => 'Nama tidak boleh kosong',
            'alamat_user.required'    => 'Alamat tidak boleh kosong',
            'email_user.required'    => 'Email tidak boleh kosong',
            'email_user.email'       => 'Email tidak valid',
            'email_user.unique'      => 'Email sudah terdaftar',
            'notelp_user.required'  => 'Nomor telepon tidak boleh kosong',
            'password_user.required'=> 'Kata sandi tidak boleh kosong',
            'password_user.min'     => 'Kata sandi harus minimal 6 karakter',
            'password_user.regex'   => 'Kata sandi tidak boleh mengandung spasi',
            'confirpassword.required' => 'Konfirmasi kata sandi tidak boleh kosong',
            'confirpassword.same'   => 'Konfirmasi kata sandi harus sama dengan kata sandi',
            'confirpassword.regex'   => 'Konfirmasi kata sandi tidak boleh mengandung spasi',
        ];

        // Validasi data
        $validated = $request->validate([
            'nama_user' => 'required|string|max:255',
            'alamat_user' => 'required',
            'email_user' => 'required|email|unique:user,email_user',
            'notelp_user' => 'required',
            'password_user' => 'required|min:6|regex:/^[a-zA-Z0-9\'\-]+$/',
            'confirpassword' => 'required|same:password_user|regex:/^[a-zA-Z0-9\'\-]+$/',
        ], $customMessage);

        // Buat pengguna baru
        $user = new User();
        $user->nama_user = $validated['nama_user'];
        $user->alamat_user = $validated['alamat_user'];
        $user->email_user = $validated['email_user'];
        $user->notelp_user = $validated['notelp_user'];
        $user->password_user = Hash::make($validated['password_user']);
        $user->foto_user = '';
        $user->level_user = 'user';
        $user->save();


        // Mengarahkan ke halaman yang diinginkan setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil, Silahkan Login!');
    }
}