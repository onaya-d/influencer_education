<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // 配信日時設定画面
    public function index()
    {
        return view('admin.delivery');
    }

    // 配信日時設定登録処理
    public function store(Request $request)
    {
        // DB連携後に実装
    }
}