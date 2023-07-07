<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('news');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Invalid email or password']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
