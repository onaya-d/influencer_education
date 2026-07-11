<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ユーザー関連のグループ
Route::prefix('user')->namespace('User')->name('user.')->group(function () {

    Route::get('/register', [App\Http\Controllers\User\RegisterController::class, 'showRegisterForm'])->name('show.register');

    // 登録ボタンを押した時のデータ処理用（POST）
    Route::post('/register', [App\Http\Controllers\User\RegisterController::class, 'register'])->name('register');

});

// ログイン画面を表示する（GET）
Route::get('/login', function () {
    return view('auth.login');
})->name('show.login');

// ログインボタンを押したときの処理（POST）
Route::post('/login', [LoginController::class, 'login']);

use App\Http\Controllers\HomeController; // コントローラーを読み込む記述

// トップ画面（ログイン後に遷移するページ）
Route::get('/home', [TopController::class, 'index'])->name('home');