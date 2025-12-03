<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\Admin\AdminPhoneController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\PhoneSelectConroller;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminDashController;

use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\SigninController;

use App\Http\Controllers\User\UserBalanceController;
use App\Http\Controllers\User\UserOrdersController;
use App\Http\Controllers\User\UserProfileController;


Route::resource('/profile', UserProfileController::class);
Route::post('/profile/updatepassword', [UserProfileController::class, 'update_password'])->name('profile.updatepassword');
Route::resource('/balance', UserBalanceController::class);
Route::resource('user/orders', UserOrdersController::class);


// Страцицы
Route::controller(PagesController::class)->group(function (){
    Route::get('/', 'main')->name('pages.main');

    Route::get('/cart',  'cart')->name('pages.cart');
    Route::post('/cart', 'cart_append')->name('pages.cart.append');
    Route::post('/cart/update/{purchase}', 'cart_paid')->name('pages.cart.paid');
    Route::delete('/cart/delete/{purchase}', 'cart_delete')->name('pages.cart.delete');

    Route::get('/ticket/{phone}', 'ticket')->name('pages.ticket');

    Route::get('/shope/{brand?}/{series?}/{generation?}', 'shope')->name('pages.shope');
});


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
    Route::resource('dashboard', AdminDashController::class);
    Route::resource('a_phones', AdminPhoneController::class);
    Route::resource('a_users', AdminUserController::class);
    Route::resource('a_orders', AdminOrderController::class);

    // Добавляем AJAX-метод для обновления stock
    Route::post('a_phones/{phone}/update-stock', [AdminPhoneController::class, 'updateStock'])
        ->name('admin.a_phones.update-stock');
});

Route::controller(PhoneSelectConroller::class)->group(function(){
    Route::get('/api/select/level1',  'getOneLevelSelect');
    Route::get('/api/select/level2',  'getTwoLevelSelect');
    Route::get('/api/select/level3',  'getThreeLevelSelect');
    Route::get('/api/select/level4', 'getFourLevelSelect');
    Route::get('/api/select/level5', 'getFiveLevelSelect');
    Route::get('/api/select/level6', 'getSixLevelSelect');
});