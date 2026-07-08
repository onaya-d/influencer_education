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

// 管理者用ルート
Route::prefix('admin')->group(function () {
    // 授業一覧
    Route::get('/curriculum', [App\Http\Controllers\Admin\CurriculumController::class, 'index'])->name('admin.curriculum.index');

    // 授業新規登録
    Route::get('/curriculum/create', [App\Http\Controllers\Admin\CurriculumController::class, 'create'])->name('admin.curriculum.create');

    // 授業編集
    Route::get('/curriculum/{id}/edit', [App\Http\Controllers\Admin\CurriculumController::class, 'edit'])->name('admin.curriculum.edit');
    
    // 配信日時設定
    Route::get('/delivery', [App\Http\Controllers\Admin\DeliveryController::class, 'index'])->name('admin.delivery.index');
});

// 授業新規登録（POST）
Route::post('/curriculum', [App\Http\Controllers\Admin\CurriculumController::class, 'store'])->name('admin.curriculum.store');
// 配信日時設定（POST）
Route::post('/delivery', [App\Http\Controllers\Admin\DeliveryController::class, 'store'])->name('admin.delivery.store');