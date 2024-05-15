<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $customMessage = [
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'email.exists'      => 'Email tidak terdaftar',
        ];

        $request->validate([
            'email' => 'required|email|exists:user,email_user'
        ], $customMessage);

        $token = \Str::random(5);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail:: to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('password.request')->with('success', 'Kami telah mengirimkan link reset password ke email anda');        
    }
    public function resetPassword(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }
        
        return view('auth.confirm-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $customMessage = [
            'password_user.required' => 'Password tidak boleh kosong',
            'password_user.min'      => 'Password minimal 6 karakter',
        ];

        $request->validate([
            'password_user' => 'required|min:6'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        $user = User::where('email_user', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
        }

        $user->update([
            'password_user' => Hash::make($request->password_user)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password berhasil direset');
    }
}
