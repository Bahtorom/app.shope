<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function main(){
        return view('pages.main');
    }


    public function cart(){
        if(Auth::check()){
            $user = Auth::user();

            $cartItems = Purchase::with(['phone', 'user'])
                ->where('user_id', $user->id)
                ->where('status', 'cart')
                ->get();

            return view('pages.cart', compact('cartItems', 'user'));
        } else {
            return redirect()->route('signin');
        }
    }


    public function cart_append(Request $request)
    {
        $request->validate([
            'phone_id' => 'required|exists:phones,id'
        ]);

        $userId = Auth::id();
        $phoneId = $request->phone_id;
        $price = Phone::findOrFail($phoneId)->price;

        Purchase::where('user_id', $userId)
            ->where('phone_id', $phoneId)
            ->where('status', 'cart')
            ->delete();

        Purchase::create([
            'user_id' => $userId,
            'phone_id' => $phoneId,
            'quantity' => 1,
            'price_at_purchase' => $price,
            'status' => 'cart',
            'purchased_at' => null,
        ]);
        
        return response()->json(['success' => true]);
    }


    public function cart_paid(Purchase $purchase){

        if (Auth::user()->deposit < $purchase->phone->price){
            return redirect()->back()->withErrors([
                'balance' => 'Недостаточно средств на балансе!'
            ]);
        }

        if ($purchase->phone->stock == 0){
            return redirect()->back()->withErrors([
                'stock' => 'Товар закончился, ожидайте пополнения!'
            ]);
        }
        
        Auth::user()->update([
            'deposit' => Auth::user()->deposit - $purchase->phone->price,
        ]);

        $purchase->phone->update([
            'stock' => $purchase->phone->stock - 1,
        ]);

        $purchase->update([
            'status' => 'pending',
            'purchased_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Заявка успешно создана!');
    }


    public function cart_delete(Purchase $purchase){
        $purchase->delete();
        return redirect()->route('pages.cart');
    }

    
    public function ticket(Phone $phone){
        $brand = $phone->brand;

        $cartPhone = [];
        if (Auth::check()){
            $cartPhone = Purchase::where('user_id', Auth::id())
                ->where('status', 'cart')
                ->pluck('phone_id')
                ->toArray();
        }
        return view('pages.ticket', compact('phone', 'brand', 'cartPhone'));
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
        
        $cartPhone = [];
        if (Auth::check()){
            $cartPhone = Purchase::where('user_id', Auth::id())
                ->where('status', 'cart')
                ->pluck('phone_id')
                ->toArray();
        }

        return view('pages.shope', compact('phones', 'brand', 'series', 'generation', 'variant', 'cartPhone'));
    }
}
