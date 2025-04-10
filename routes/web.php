<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\SucursaleController;
=======
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UserController;
>>>>>>> 0396c0cfe425a28e93d2a6e453eac07214264007

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('sucursales', SucursaleController::class);
});

require __DIR__.'/auth.php';
=======
Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('pizzas', PizzaController::class);
    Route::resource('pizza_sizes', PizzaSizeController::class);
    Route::resource('ingredients', IngredientController::class);
});
>>>>>>> 0396c0cfe425a28e93d2a6e453eac07214264007
