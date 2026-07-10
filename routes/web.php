<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 管理者用ルート
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    // 授業一覧
    Route::get('/curriculum_list', 'CurriculumController@showCurriculumList')->name('show.curriculum.list');
    // 授業新規登録
    Route::get('/curriculum_create', 'CurriculumController@showCurriculumCreate')->name('show.curriculum.create');
    // 授業編集
    Route::get('/curriculum_edit/{id}', 'CurriculumController@showCurriculumEdit')->name('show.curriculum.edit');
    // 配信日時設定
    Route::get('/delivery_edit/{id}', 'DeliveryController@showDeliveryEdit')->name('show.delivery.edit');

    // 登録処理（POST）
    Route::post('/curriculum_create', 'CurriculumController@store')->name('curriculum.store');
    Route::post('/delivery_edit/{id}', 'DeliveryController@store')->name('delivery.store');
});