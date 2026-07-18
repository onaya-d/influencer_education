<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController; // ★ファイル上部にまとめました
use App\Http\Controllers\LessonController; // ★ファイル上部にまとめました

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

// トップ画面（ログイン後に遷移するページ）
Route::get('/home', [TopController::class, 'index'])->name('home');

// ログアウト処理
Route::get('/logout', [TopController::class, 'logout'])->name('logout'); // ★重複していた記述をすっきりさせました

// 授業詳細画面へのルーティング
Route::get('/lessons/{id}', [LessonController::class, 'show']);

// 受講完了ボタンを押したときの処理（POST）
Route::post('/lessons/{id}/complete', [LessonController::class, 'complete'])->name('lessons.complete');