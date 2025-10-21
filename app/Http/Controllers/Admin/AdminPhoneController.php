<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class AdminPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.a_phones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.a_phones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'brand' => 'required|string|max:30',
            'series' => 'required|string|max:30',
            'generation' => 'nullable|string|max:30',
            'variant' => 'nullable|string|max:30',
            'price' => 'required|numeric|min:0|max:999999.99',
            'stock' => 'required|integer|min:0|max:100000',
            'image' => 'nullable|image|mimes:jpeg,phg,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')){
            $validation['image'] = $request->file('image')->store('images/phones', 'public');
        }

        Phone::create($validation);

        return redirect()->route('a_phones.index');
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
