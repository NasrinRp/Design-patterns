<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/factory-method', [ClientController::class, 'useFactoryMethod'])->name('factory-method');
Route::get('/strategy', [ClientController::class, 'useStrategy'])->name('strategy');
Route::get('/singleton', [ClientController::class, 'useSingleton'])->name('singleton');
