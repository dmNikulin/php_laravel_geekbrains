<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/form', [\App\Http\Controllers\EmployeeController::class, 'store']);
Route::put('/form/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);
