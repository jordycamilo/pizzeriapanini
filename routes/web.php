<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::resource('orders', OrderController::class);
Route::resource('pizzas', PizzaController::class);