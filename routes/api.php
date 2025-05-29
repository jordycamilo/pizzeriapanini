<?php

use App\Http\Controllers\api\SucursaleController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('sucursales', SucursaleController::class);
Route::resource('users', UserController::class);

