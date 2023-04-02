<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('home',[HomeController::class, 'index'])->name('customer-home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('profile',[MemberController::class, 'index'])->name('profile.index');
    Route::post('profile-update/{id}',[MemberController::class, 'update'])->name('profile-update');
    Route::get('profile-destroy/{id}',[MemberController::class, 'destroy'])->name('profile-destroy');

    Route::get('create-order',[OrderController::class, 'createOrder'])->name('create-order');
    Route::get('add-cart',[HomeController::class, 'addCart'])->name('add-cart');
    Route::get('remove-cart',[HomeController::class, 'removeCart'])->name('remove-cart');
    Route::get('add-wishlist',[HomeController::class, 'addWishlist'])->name('add-wishlist');

    Route::get('order-cancel-by-user/{id}',[OrderController::class, 'orderCancelByUser'])->name('order-cancel-by-user');
    Route::get('user-orders/{id}',[OrderController::class, 'userOrders'])->name('user-orders');
    //admin Route
    Route::middleware('admin_auth')->group(function(){
        Route::get('admin-home', [OrderController::class, 'recentOrderList'])->name('admin-home');
        Route::resources([
            'restaurants' => RestaurantController::class,
            'food' => FoodController::class,
            'menus' => MenuController::class,
        ]);

        Route::get('restaurants-delete/{restaurant}',[RestaurantController::class, 'destroy'])->name('restaurants.delete');
        Route::get('food-delete/{id}',[FoodController::class, 'destroy'])->name('food.delete');
        Route::get('menu-delete/{id}',[MenuController::class, 'destroy'])->name('menus.delete');


        Route::get('order-approve/{id}',[OrderController::class, 'orderApprove'])->name('order.approve');
        Route::get('order-cancel/{id}',[OrderController::class, 'orderCancel'])->name('order.cancel');
        Route::get('order-complete/{id}',[OrderController::class, 'orderComplete'])->name('order.complete');
        Route::get('all-order',[OrderController::class, 'allOrders'])->name('all.order');
        Route::get('delete-order/{id}',[OrderController::class, 'deleteOrder'])->name('order.delete');


    });

});

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::redirect('/', 'login', 301);

    Route::view('admin-login', 'auth.admin_login')->name('admin-login');
    Route::view('register', 'auth.register')->name('auth-register');

    Route::post('save-user', [AuthController::class, 'register'])->name('save-user');
    Route::post('login-user', [AuthController::class, 'authLogin'])->name('login-user');

    Route::post('admin-auth', [AuthController::class, 'adminAuth'])->name('admin-auth');

    Route::get('auth/google', [AuthController::class, 'redirect'])->name('auth-google');
    Route::get('auth/google/call-back', [AuthController::class, 'callbackGoogle'])->name('callback-google');
});









