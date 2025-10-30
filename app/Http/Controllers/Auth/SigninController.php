<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SigninController extends Controller
{

    public function signin_form(){
        return view('auth.signin');
    }

    public function login(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))){
            $request->session()->regenerate();

            if (Auth::check() && Auth::user()->isAdmin()){
                return redirect()->route('pages.main');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main');
    }
}
