<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.balance', compact('user'));
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
          $validation = $request->validate([
            'val_phone' => 'required|string|regex:/^\+7[0-9]{10}$/',
            'deposit' => 'required|integer|min:0|max:1000000',
        ],[
            'val_phone' => 'Некорректный номер телефона',
            'deposit' => 'Некорректный депозит'
        ]
    );

        $user = Auth::user();

     
        $user->deposit += $validation['deposit'];
        $user->val_phone = $validation['val_phone'];

        $user->save();

        return redirect()->route('balance.index');
   
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
