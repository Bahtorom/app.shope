<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin.a_users.index', compact('users'));
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
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $a_user)
    {
         return view('admin.a_users.edit', compact('a_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $a_user)
    {
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email'],
            'val_phone' => ['nullable', 'string', 'regex:/^\+7[0-9]{10}$/'],
            'first_name' => ['nullable', 'string', 'max:15' ],
            'last_name' => ['nullable', 'string', 'max:15' ],
            'role' => ['nullable', 'string', 'max:15'],
            'deposit' => 'required|integer|min:0|max:1000000',
        ],[
            'name' => 'Псевдоним должен быть не более 10 символов',
            'first_name' => 'Имя должно быть не более 15 символов',
            'last_name' => 'Фамилия должна быть не более 15 символов',
            'email' => 'Некорректный email',
            'val_phone' => 'Некорректный номер телефона',
            'deposit' => 'Некорректный депозит',
        ]);

        $a_user->update([
            'name' => $validation['name'] ?? '',
            'email' => $validation['email'] ?? '',
            'val_phone' => $validation['val_phone'] ?? '',
            'first_name' => $validation['first_name'] ?? '',
            'last_name' => $validation['last_name'] ?? '',
            'role' => $validation['role'] ?? '',
            'deposit' => $validation['deposit'] ?? 0,
        ]);

        return redirect()->route('a_users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
