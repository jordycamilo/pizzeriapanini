<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\IngredientController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::resource('orders', OrderController::class);
Route::resource('pizzas', PizzaController::class);
Route::resource('pizza_sizes', \App\Http\Controllers\PizzaSizeController::class);
Route::resource('ingredients', IngredientController::class);