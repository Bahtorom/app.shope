<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model 
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'series',
        'generation',
        'variant',
        'price',
        'stock',
        'image',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'purchases')
                    ->withPivot('quantity', 'price_at_purchase', 'purchased_at')
                    ->withTimestamps();
    }
    
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}