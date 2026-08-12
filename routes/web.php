<?php

use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\User\ProgressController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])
        ->name('show.register');

    Route::post('/register', [RegisterController::class, 'register'])
        ->name('register');

    Route::get('/progress', [ProgressController::class, 'index'])
        ->name('progress');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/notice-list', [AdminNoticeController::class, 'index'])
        ->name('notice.list');

});

Route::get('/login', function () {
    return view('auth.login');
})->name('show.login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [TopController::class, 'index'])
    ->name('home');

Route::get('/logout', [TopController::class, 'logout'])
    ->name('logout');

Route::get('/lessons/{id}', [LessonController::class, 'show']);

Route::post('/lessons/{id}/complete', [LessonController::class, 'complete'])
    ->name('lessons.complete');