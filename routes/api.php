<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::apiResource('services', API\ServiceController::class);
    Route::apiResource('transactions', API\TransactionController::class);
    Route::apiResource('payments', API\PaymentController::class);
    Route::apiResource('purchases', API\PurchaseController::class);
    Route::apiResource('users', API\UserController::class);
}
);



