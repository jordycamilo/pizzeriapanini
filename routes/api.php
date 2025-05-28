<?php

use App\Http\Controllers\api\SucursaleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sucursales',[SucursaleController::class,'index'])->name('sucursales');
Route::get('/sucursales/{id}',[SucursaleController::class,'show'])->name('sucursales.show');
Route::post('/sucursales',[SucursaleController::class,'store'])->name('sucursales');
Route::put('/sucursales/{id}',[SucursaleController::class,'update'])->name('sucursales.update');
Route::delete('/sucursales/{id}',[SucursaleController::class,'destroy'])->name('sucursales.destroy');

//Route::get('/users', [UserController::class, 'index'])->name('users');
Route::resource('clients', ClientController::class);

//Route::get('/clients/{id}',[ClientController::class,'show'])->name('clients.show');
//Route::post('/clients',[ClientController::class,'store'])->name('clients');
//Route::put('/clients/{id}',[ClientController::class,'update'])->name('clients.update');
//Route::delete('/clients/{id}',[ClientController::class,'destroy'])->name('clients.destroy');


//Route::resource('clients', SucursaleController::class);
//Route::resource('users', UserController::class);