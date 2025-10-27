<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PagesController extends Controller
{
    public function main(){
        return view('pages.main');
    }

    public function signup(){
        return view('pages.signup');
    }

    public function signin(){
        return view('pages.signin');
    }

    public function about(){
        return view('pages.about');
    }

    public function shope($brand=null, $series=null, $generation=null){
        
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

        $phones = $query->get();


        return view('pages.shope', compact('phones', 'brand', 'series', 'generation'));
    }
}
