<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\PendingResourceRegistration;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);



