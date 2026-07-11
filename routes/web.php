<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 管理者用ルート
Route::prefix('admin')->name('admin.')->group(function () {
    // 授業一覧
    Route::get('/curriculum_list', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum.list');
    // 授業新規登録
    Route::get('/curriculum_create', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumCreate'])->name('show.curriculum.create');
    // 授業編集
    Route::get('/curriculum_edit/{id}', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumEdit'])->name('show.curriculum.edit');
    // 配信日時設定
    Route::get('/delivery_edit/{id}', [App\Http\Controllers\Admin\DeliveryController::class, 'showDeliveryEdit'])->name('show.delivery.edit');

    // 登録処理（POST）
    Route::post('/curriculum_create', [App\Http\Controllers\Admin\CurriculumController::class, 'store'])->name('curriculum.store');
    Route::post('/delivery_edit/{id}', [App\Http\Controllers\Admin\DeliveryController::class, 'store'])->name('delivery.store');
});