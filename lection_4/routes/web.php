<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/', function () {
    $user =  ['name'=>'John','age'=>18,'position'=>'USA','address'=>'13 avenue'];
    return view('home', ['user'=>$user]);
});

Route::get('/contacts', function () {
    $userInfo =  [ 'address' => '13 avenue', 'post_code' => 'null', 'email'=>'example@tail.com', 'phone' => '888888888'];
    return view('contacts', ['userInfo'=>$userInfo]);
});