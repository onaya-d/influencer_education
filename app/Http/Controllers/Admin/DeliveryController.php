<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // 配信日時設定画面
    public function showDeliveryEdit($id)
    {
        return view('admin.delivery');
    }

    // 配信日時設定登録処理
    public function store(Request $request)
    {
        $request->validate([
            'start_date.*' => 'required',
            'start_time.*' => 'required',
            'end_date.*'   => 'required',
            'end_time.*'   => 'required',
        ]);

        // DB連携後に実装
    }
}