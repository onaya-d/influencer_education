<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProgressController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/progress', [ProgressController::class, 'index'])
    ->name('user.progress');