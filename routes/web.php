<?php

use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\User\NoticeController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\ProfileController;
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

    Route::get('/notice/{id}', [NoticeController::class, 'show'])
        ->name('notice');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/password', [PasswordController::class, 'index'])
        ->name('password');

    Route::post('/password', [PasswordController::class, 'update'])
        ->name('password.update');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/notice-list', [AdminNoticeController::class, 'index'])
        ->name('notice.list');

    Route::get('/notice/create', [AdminNoticeController::class, 'create'])
        ->name('notice.create');

    Route::post('/notice', [AdminNoticeController::class, 'store'])
        ->name('notice.store');

    Route::get('/notice/{id}/edit', [AdminNoticeController::class, 'edit'])
        ->name('notice.edit');

    Route::put('/notice/{id}', [AdminNoticeController::class, 'update'])
        ->name('notice.update');

    Route::delete('/notice/{id}', [AdminNoticeController::class, 'destroy'])
        ->name('notice.destroy');
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