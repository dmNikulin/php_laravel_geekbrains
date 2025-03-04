<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/welcome', function() {
    $email = 'skygift.work@gmail.com';
    Mail::to($email)->send(new Welcome());
    return 'Mail send success';
});

Route::get('test-telegram', function () {
    Telegram::sendMessage([
    'chat_id' => env('TELEGRAM_CHANNEL_ID'),
    'parse_mode' => 'html',
    'text' => 'Произошло тестовое событие'
    ]);
    return response()->json([
    'status' => 'success'
    ]);
    });