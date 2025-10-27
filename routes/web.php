<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminPhoneController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Admin\PhoneSelectConroller;
use App\Http\Controllers\User\UserBalanceController;
use App\Http\Controllers\User\UserProfileController;

Route::resource('/profile', UserProfileController::class);
Route::post('/profile/updatepassword', [UserProfileController::class, 'update_password'])->name('profile.updatepassword');

Route::resource('/balance', UserBalanceController::class);


// Страцицы
Route::get('/', [PagesController::class, 'main'])->name('main');
Route::get('/shope/{brand?}/{series?}/{generation?}', [PagesController::class, 'shope'])->name('shope');



// Регистрация и авторизация
Route::get('/signup', [SignupController::class, 'signup_form'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.store');

Route::controller(SigninController::class)->group(function (){
    Route::get('/signin', 'signin_form')->name('signin');
    Route::post('/signin', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});


//Админка

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function (){
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::resource('a_phones', AdminPhoneController::class);
    Route::resource('a_users', AdminUserController::class);
});

Route::get('/api/select/level1', [PhoneSelectConroller::class, 'getOneLevelSelect']);
Route::get('/api/select/level2', [PhoneSelectConroller::class, 'getTwoLevelSelect']);
Route::get('/api/select/level3', [PhoneSelectConroller::class, 'getThreeLevelSelect']);
Route::get('/api/select/level4', [PhoneSelectConroller::class, 'getFourLevelSelect']);
Route::get('/api/select/level5', [PhoneSelectConroller::class, 'getFiveLevelSelect']);
Route::get('/api/select/level6', [PhoneSelectConroller::class, 'getSixLevelSelect']);