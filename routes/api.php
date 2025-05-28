<?php

use App\Http\Controllers\api\SucursaleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\EmployeeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sucursales',[SucursaleController::class,'index'])->name('sucursales');
Route::get('/sucursales/{id}',[SucursaleController::class,'show'])->name('sucursales.show');
Route::post('/sucursales',[SucursaleController::class,'store'])->name('sucursales');
Route::put('/sucursales/{id}',[SucursaleController::class,'update'])->name('sucursales.update');
Route::delete('/sucursales/{id}',[SucursaleController::class,'destroy'])->name('sucursales.destroy');

Route::resource('clients', ClientController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('extra_ingredients', Extra_ingredientController::class);
Route::resource('ingredients', IngredientController::class);
Route::resource('order_ongredients', Order_ongredientController::class);
Route::resource('orders', OrderController::class);
Route::resource('pizza_ingredients', Pizza_ingredientController::class);
Route::resource('raw_materials', Raw_materialController::class);
Route::resource('pizza_sizes', Pizza_sizeController::class);
Route::resource('pizzas', PizzaController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('users', UserController::class);


