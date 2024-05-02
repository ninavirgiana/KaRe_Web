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

    public function register_post(Request $request) {
        $request->validate([
            'nama_user' => 'required',
            'alamat_user' => 'required',
            'email_user' => 'required|email|unique:user,email_user',
            'notelp_user' => 'required',
            'password_user' => 'required|min:6',
        ]);

        $data['nama_user'] = $request->nama_user;
        $data['alamat_user'] = $request->alamat_user;
        $data['email_user'] = $request->email_user;
        $data['notelp_user'] = $request->notelp_user;
        $data['password_user'] = Hash::make($request->password_user);


        User::create($data);
        

        // $login = [
        //     'email_user' => $request->email_user,
        //     'password_user' => $request->password_user
        // ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('/login');
        } 
        
        return redirect()->back()->withInput($request->only('email_user'))->withErrors([
            'login_failed' => 'Email atau password salah.',
        ]);
    }
}