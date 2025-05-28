<?php

use App\Http\Controllers\api\SucursaleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\ExtraIngredientController;
use App\Http\Controllers\api\IngredientController;
use App\Http\Controllers\api\Order_ongredientController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PizzaIngredientController; 
use App\Http\Controllers\api\Raw_materialController;
use App\Http\Controllers\api\PizzaSizeController;
use App\Http\Controllers\api\PizzaController;
use App\Http\Controllers\api\SupplierController; 
use App\Http\Controllers\api\OrderIngredientController;
   

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
Route::resource('extra-ingredients', ExtraIngredientController::class);
Route::resource('ingredients', IngredientController::class);
Route::apiResource('order-ingredients', OrderIngredientController::class)->only([
    'index', 'store', 'show', 'destroy'
]);

Route::resource('orders', OrderController::class);
Route::resource('pizza-ingredients', PizzaIngredientController::class);
Route::resource('raw-materials', Raw_materialController::class);
Route::resource('pizza-sizes', PizzaSizeController::class);
Route::resource('pizzas', PizzaController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('users', UserController::class);


