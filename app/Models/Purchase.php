<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function phone(){
        return $this->belongsTo(Phone::class);
    }
}
