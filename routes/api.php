<?php

use App\Http\Controllers\api\SucursaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sucursales',[SucursaleController::class,'index']);
Route::get('/sucursales/{id}',[SucursaleController::class,'show']);
Route::post('/sucursales',[SucursaleController::class,'store']);
Route::put('/sucursales/{id}',[SucursaleController::class,'update']);