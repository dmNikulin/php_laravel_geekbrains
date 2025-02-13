<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [\App\Http\Controllers\UserController::class, 'index']);

Route::post('/form', [\App\Http\Controllers\UserController::class, 'store'])->name('store-user');



