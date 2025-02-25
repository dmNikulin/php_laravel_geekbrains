<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfGeneratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form',[UserController::class, 'index'])->name('show-form');
Route::get('/users',[UserController::class, 'getall']);
Route::get('/user/{id}',[UserController::class, 'getuser']);

Route::get('/resume/{id}',[PdfGeneratorController::class, 'index'])->name('resume');
Route::get('/resume',[PdfGeneratorController::class, 'index']);

Route::post('/form',[UserController::class, 'adduser'])->name('adduser');
