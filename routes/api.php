<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){

    Route::post('place-order', [ApiController::class, 'placeOrder']);
    
    Route::get('update-order-status-by-user/{id}', [ApiController::class, 'updateOrderStatusByUser']);

    Route::middleware('admin_auth_api')->group(function () {
        Route::post('add-restaurant', [ApiController::class, 'addRestaurant']);
        Route::post('add-food', [ApiController::class, 'addFood']);
        Route::post('update-order-status', [ApiController::class, 'updateOrderStatus']);

    });
});

Route::post('user-register', [ApiController::class, 'userRegister']);
Route::post('user-login', [ApiController::class, 'userLogin']);
Route::post('admin-login', [ApiController::class, 'adminLogin']);