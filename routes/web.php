<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
    
});


Route::resource('/clients/create', [ClientController::class, 'create'])->name('clients.create');
