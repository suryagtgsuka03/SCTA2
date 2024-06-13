<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/monitor');
        } else {
            return view('public.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect('monitor');
        } else {
            // Cek apakah email tidak ditemukan
            $user = \App\Models\User::where('email', $request->input('email'))->first();
            if (!$user) {
                return redirect()->back()->withErrors([
                    'email' => 'Email atau Password yang Anda masukkan salah.',
                ]);
            } else {
                return redirect()->back()->withErrors([
                    'password' => 'Email atau Password yang Anda masukkan salah.',
                ]);
            }
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}