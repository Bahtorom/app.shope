<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validation = $request->validate([
            'name' => ['required', 'string', 'max:10'],
            'first_name' => ['nullable', 'string', 'max:15' ],
            'last_name' => ['nullable', 'string', 'max:15' ],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::id())],
            'val_phone' => ['nullable', 'string', 'regex:/^\+7[0-9]{10}$/']
        ],[
            'name' => 'Псевдоним должен быть не более 10 символов',
            'first_name' => 'Имя должно быть не более 15 символов',
            'last_name' => 'Фамилия должна быть не более 15 символов',
            'email' => 'Некорректный email',
            'val_phone' => 'Некорректный номер телефона',
        ]);

        $user = Auth::user();
        $user->update($validation);
        
        return redirect()->back()->with('success_up', 'Учетная запись успешно обновлена!');
    }

    public function update_password(Request $request)
    {
        $validation = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ],[
            'current_password.current_password' => 'Текущий пароль указан неверно.',
            'password.min' => 'Пароль должен быть не менее 8 символов.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
        ]);
        
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validation['password']),
            'password_encode' => $validation['password'],
        ]);

        return back()->with('success', 'Пароль успешно изменён!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
