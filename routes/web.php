<?php

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [TopController::class, 'logout'])
    ->name('logout');


// ログイン必須のグループ（ここに追加します）
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [TopController::class, 'index'])
        ->name('home');

    Route::get('/lessons/{id}', [LessonController::class, 'show'])
        ->name('lessons.show');

    Route::post('/lessons/{id}/complete', [LessonController::class, 'complete'])
        ->name('lessons.complete');

});