<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/form', [BookController::class, 'index'])->name('show-form');
Route::post('/form', [BookController::class, 'store'])->name('post-form');