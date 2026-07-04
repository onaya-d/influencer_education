<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->namespace('User')->name('user.')->group(function () {


    Route::get('/register', [App\Http\Controllers\User\RegisterController::class, 'showRegisterForm'])->name('show.register');

    // 登録ボタンを押した時のデータ処理用（POST）
    Route::post('/register', [App\Http\Controllers\User\RegisterController::class, 'register'])->name('register');

});