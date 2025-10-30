<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'user_id',
        'phone_id',
        'buy',
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
