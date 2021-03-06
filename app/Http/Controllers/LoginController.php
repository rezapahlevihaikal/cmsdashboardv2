<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
 
        return back()->with('loginError', 'Login failed');
    }
 
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return view('auth.login');
    }
}
