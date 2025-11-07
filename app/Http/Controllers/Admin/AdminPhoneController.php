<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phones = Phone::orderBy('id')->get();
        return view('admin.a_phones.index', compact('phones'));
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
            'color' => 'nullable|string|max:30',
            'memory' => 'nullable|string|max:30',
            'price' => 'nullable|integer|min:0|max:99999999',
            'stock' => 'nullable|integer|min:0|max:100000',
            'description' => 'nullable|string|max:100000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('images/phones', 'public')
        : '';

        // Ищем существующую запись
        $phone = Phone::firstOrNew([
            'brand' => $validation['brand'],
            'series' => $validation['series'],
            'generation' => $validation['generation'] ?? '',
            'variant' => $validation['variant'] ?? '',
            'color' => $validation['color'] ?? '',
            'memory' => $validation['memory']?? '',
        ]);

        if ($phone->exists) {
            // Обновляем существующую запись
            $phone->price = empty($validation['price']) ? $phone->price : $validation['price'];
            $phone->stock += $validation['stock']; // ← PHP-сложение (атомарности нет, но можно улучшить)
            $phone->description = empty($validation['description']) ? $phone->description : $validation['description'];
            if ($imagePath !== '') {
                $phone->image = $imagePath;
            }
            $phone->save();
        } else {
            // Создаём новую запись
            $phone->fill([
                'price' => $validation['price'] ?? 0,
                'stock' => $validation['stock'] ?? 0,
                'description' => $validation['description'] ?? 0,
                'image' => $imagePath,
            ]);
            $phone->save();
        }


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
    public function edit(Phone $a_phone)
    {
        
        return view('admin.a_phones.edit', compact('a_phone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $a_phone)
    {
         
        $validation = $request->validate([
            'brand' => 'required|string|max:30',
            'series' => 'required|string|max:30',
            'generation' => 'nullable|string|max:30',
            'variant' => 'nullable|string|max:30',
            'color' => 'nullable|string|max:30',
            'memory' => 'nullable|string|max:30',
            'price' => 'nullable|integer|min:0|max:99999999',
            'stock' => 'nullable|integer|min:0|max:100000',
            'description' => 'nullable|string|max:100000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('images/phones', 'public')
        : '';

        $a_phone->update([
            'brand' => $validation['brand'],
            'series' => $validation['series'],
            'generation' => $validation['generation'] ?? '',
            'variant' => $validation['variant'] ?? '',
            'color' => $validation['color'] ?? '',
            'memory' => $validation['memory']?? '',
            'price' => $validation['price'] ?? 0,
            'stock' => $validation['stock'] ?? 0,
            'description' => $validation['description'] ?? '',
            'image' => $request->hasFile('image') ? $imagePath : $a_phone->image,
        ]);

        return redirect()->route('a_phones.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $a_phone)
    {
        $a_phone->delete();

        return redirect()->route('a_phones.index');
    }
}
