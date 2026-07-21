<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProgressController;
use App\Http\Controllers\User\NoticeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/progress', [ProgressController::class, 'index'])
    ->name('user.progress');

Route::get('/user/notice/{id}', [NoticeController::class, 'show'])
    ->name('user.notice');