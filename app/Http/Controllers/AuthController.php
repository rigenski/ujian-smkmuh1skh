<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin()
    {
        if (Auth::attempt(request()->only('username', 'password'))) {
            return redirect('/admin');
        }

        return redirect('/login')->with('mess', 'Data yang dimasukkan salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
