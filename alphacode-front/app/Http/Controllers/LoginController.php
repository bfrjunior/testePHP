<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/v1/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

            return redirect()->route('home');
    }

    public function logout()
    {
        $response = Http::post('http://127.0.0.1:8000/api/v1/logout', [
        ]);

        Auth::logout(); 

        return redirect()->route('login');
    }
}

