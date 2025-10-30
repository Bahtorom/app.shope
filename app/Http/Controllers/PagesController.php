<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function main(){
        return view('pages.main');
    }

    public function cart(){

        $user = Auth::user();

        $cartItems = Purchase::with(['phone', 'user'])
            ->where('user_id', $user->id)
            ->where('buy', false)
            ->get();

        return view('pages.cart', compact('cartItems', 'user'));
    }


    public function cart_append(Request $request)
    {
        $request->validate([
            'phone_id' => 'required|exists:phones,id'
        ]);

        $userId = Auth::id();
        $phoneId = $request->phone_id;
        $price = Phone::findOrFail($phoneId)->price;

        $purchase = Purchase::firstOrNew([
            'user_id' => $userId,
            'phone_id' => $phoneId,
        ]);

        if ($purchase->exists) {
            // Уже есть — увеличиваем количество
            $purchase->quantity += 1;
        } else {
            // Новая запись — начинаем с 1
            $purchase->buy = false;
            $purchase->quantity = 1;
            $purchase->price_at_purchase = $price;
            $purchase->purchased_at = null;
        }

        $purchase->save();

        return response()->json(['success' => true]);
    }

    public function shope($brand=null, $series=null, $generation=null, $variant=null){
        
        $query = Phone::query();

        if($brand){
            $query->where('brand', $brand);
        }

        if($series){
            $query->where('series', $series);
        }

        if ($generation){
            $query->where('generation', $generation);
        }
        
        if ($variant){
            $query->where('variant', $variant);
        }

        $phones = $query->get();

        $phones = $phones
            ->sortBy([
                ['brand', 'asc'],
                ['series', 'asc'],
                ['generation', 'desc'], // или 'asc'
            ])
            ->groupBy(['brand', 'series', 'generation']);


        return view('pages.shope', compact('phones', 'brand', 'series', 'generation', 'variant'));
    }
}
