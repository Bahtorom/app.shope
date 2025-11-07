<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'user_id',
        'phone_id',
        'status' , // cart = В корзине | pending = Купить (до подтв) | paid = Купить (после подвт) | cancel = Отменен | cancel_user = отменен юзером
        'quantity',
        'price_at_purchase',
        'purchased_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function phone(){
        return $this->belongsTo(Phone::class);
        
    }
}
