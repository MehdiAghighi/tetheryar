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
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix("auth")->group( function () {
//    Route::post("/login/index", [ \App\Http\Controllers\client\LoginController::class, "index" ]);
    Route::post("/login/SendOtpCode", [ \App\Http\Controllers\client\LoginController::class, "SendOtpCode" ]);
    Route::post('/login/verifyOtpCode/{user:mobile}', [\App\Http\Controllers\client\LoginController::class,'verifyOtpCode']);
} );

Route::get('/auth/check', [\App\Http\Controllers\client\AuthController::class,'checkAuth']);
Route::get('/auth/create', [\App\Http\Controllers\client\AuthController::class,'create']);
Route::post('/auth/store', [\App\Http\Controllers\client\AuthController::class,'store']);
Route::get('/auth/edit', [\App\Http\Controllers\client\AuthController::class,'edit']);
Route::post('/auth/update', [\App\Http\Controllers\client\AuthController::class,'update']);

// Logout
Route::delete('/logout' , [\App\Http\Controllers\client\AuthController::class , 'logout']);

Route::prefix("profile")->middleware("auth:sanctum")->group( function () {
    Route::get("" , [ \App\Http\Controllers\client\HomeController::class, 'profile' ]);
    Route::get('/buy-logs' , [\App\Http\Controllers\client\HomeController::class,'buyLogs']);
    Route::get('/sell-logs' , [\App\Http\Controllers\client\HomeController::class,'sellLogs']);
    Route::get('/referrals' , [\App\Http\Controllers\client\HomeController::class,'referrals']);
} );

Route::prefix("sell")->middleware("auth:sanctum")->group( function () {
    Route::get("step1" , [ \App\Http\Controllers\client\SellController::class, 'apiStepOne' ]);
    Route::get("checkAuth" , [ \App\Http\Controllers\client\SellController::class, 'apiCheckAuthStatus' ]);
    Route::post("getLastSellRequest" , [ \App\Http\Controllers\client\SellController::class, 'apiGetLastSellRequestData' ]);
    Route::post("storeSellRequest" , [ \App\Http\Controllers\client\SellController::class, 'storeSellRequest' ]);
    Route::post("lastStep" , [ \App\Http\Controllers\client\SellController::class, 'lastStep' ]);
} );
