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

    // public function register_post(Request $request) {
    //     $request->validate([
    //         'nama_user' => 'required',
    //         'alamat_user' => 'required',
    //         'email_user' => 'required|email|unique:user,email_user',
    //         'notelp_user' => 'required',
    //         'password_user' => 'required|min:6',
    //     ]);

    //     $data['nama_user'] = $request->nama_user;
    //     $data['alamat_user'] = $request->alamat_user;
    //     $data['email_user'] = $request->email_user;
    //     $data['notelp_user'] = $request->notelp_user;
    //     $data['password_user'] = Hash::make($request->password_user);


    //     User::create($data);
        

    //     // $login = [
    //     //     'email_user' => $request->email_user,
    //     //     'password_user' => $request->password_user
    //     // ];

    //     if (Auth::attempt($data)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/login');
    //     } 
        
    //     return redirect()->back()->withInput($request->only('email_user'))->withErrors([
    //         'login_failed' => 'Email atau password salah.',
    //     ]);
    // }
    public function register_post(Request $request)
    {
        $customMessage = [
            'nama_user.required'    => 'Nama tidak boleh kosong',
            'alamat_user.required'    => 'Alamat tidak boleh kosong',
            'email_user.required'    => 'Email tidak boleh kosong',
            'email_user.email'       => 'Email tidak valid',
            'email_user.unique'      => 'Email sudah terdaftar',
            'notelp_user.required'  => 'Nomor telepon tidak boleh kosong',
            'password_user.required'=> 'Password tidak boleh kosong',
            'password_user.min'     => 'Password harus minimal 6 karakter',
            'confirpassword.required' => 'Konfirmasi password tidak boleh kosong',
            'confirpassword.same'   => 'Konfirmasi password harus sama dengan password',
        ];

        // Validasi data
        $validated = $request->validate([
            'nama_user' => 'required|string|max:255',
            'alamat_user' => 'required',
            'email_user' => 'required|email|unique:user,email_user',
            'notelp_user' => 'required',
            'password_user' => 'required|min:6',
            'confirpassword' => 'required|same:password_user',
        ], $customMessage);

        // Buat pengguna baru
        $user = new User();
        $user->nama_user = $validated['nama_user'];
        $user->alamat_user = $validated['alamat_user'];
        $user->email_user = $validated['email_user'];
        $user->notelp_user = $validated['notelp_user'];
        $user->password_user = Hash::make($validated['password_user']);
        $user->save();


        // Mengarahkan ke halaman yang diinginkan setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil, Silahkan Login!');
    }
}