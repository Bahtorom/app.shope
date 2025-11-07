<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Carbon\Carbon;


class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Purchase::where('status', 'pending')->get();

        return view('admin.a_orders.index', compact('orders'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Purchase $a_order)
    {
        
        $a_order->update([
            'status' => 'paid',
            'purchased_at' => Carbon::now(),
            
        ]);

        return redirect()->back()->with('success', 'Подтвержден успешно!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $a_order)
    {

        $a_order->user->update([
            'deposit' => $a_order->user->deposit + $a_order->phone->price,
        ]);

        $a_order->phone->update([
            'stock' => $a_order->phone->stock + 1,
        ]);

        $a_order->update([
            'status' => 'cancel',
            'purchased_at' => Carbon::now(),
            
        ]);

        return redirect()->back()->with('success', 'Отменен успешно!');
    }
}
