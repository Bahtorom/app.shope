<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function shope(){
        return view('pages.shope');
    }
}
