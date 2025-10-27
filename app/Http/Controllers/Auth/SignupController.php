<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function signup_form(){
        return view('auth.signup');
    }

    public function signup(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:10' ],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ],[
            'email.unique' => 'Этот email уже зарегистрирован.',
            'password.confirmed' => 'Пароли не совпадают.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_encode' => $request->password,
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('main')->with('success', 'Вы успешно зарегистрировались!');
    }
}
