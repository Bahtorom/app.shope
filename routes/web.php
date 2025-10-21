<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminPhoneController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Admin\PhoneSelectConroller;


Route::get('/', [PagesController::class, 'main'])->name('main');

Route::get('/signup', [SignupController::class, 'signup_form'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.store');

Route::get('/shope', [PagesController::class, 'shope'])->name('shope');

Route::controller(SigninController::class)->group(function (){
    Route::get('/signin', 'signin_form')->name('signin');
    Route::post('/signin', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});


Route::get('/api/select/level1', [PhoneSelectConroller::class, 'getOneLevelSelect']);
Route::get('/api/select/level2', [PhoneSelectConroller::class, 'getTwoLevelSelect']);
Route::get('/api/select/level3', [PhoneSelectConroller::class, 'getThreeLevelSelect']);
Route::get('/api/select/level4', [PhoneSelectConroller::class, 'getFourLevelSelect']);


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::resource('a_phones', AdminPhoneController::class);
    Route::resource('a_users', AdminUserController::class);
});