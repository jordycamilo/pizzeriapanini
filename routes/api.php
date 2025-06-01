<?php

use App\Http\Controllers\api\SucursaleController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\ExtraIngredientController;
use App\Http\Controllers\api\IngredientController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PizzaIngredientController; 
use App\Http\Controllers\api\RawMaterialController;
use App\Http\Controllers\api\PizzaSizeController;
use App\Http\Controllers\api\PizzaController;
use App\Http\Controllers\api\SupplierController; 
use App\Http\Controllers\api\OrderIngredientController;
   

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('sucursales', SucursaleController::class);
Route::resource('clients', ClientController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('extra-ingredients', ExtraIngredientController::class);
Route::resource('ingredients', IngredientController::class);
Route::resource('order-ingredients', OrderIngredientController::class)->only(['index', 'store', 'show', 'destroy']);

Route::resource('orders', OrderController::class);
Route::resource('pizza-ingredients', PizzaIngredientController::class);
Route::resource('raw-materials', RawMaterialController::class);
Route::resource('pizza-sizes', PizzaSizeController::class);
Route::resource('pizzas', PizzaController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('users', UserController::class);


