<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    // 授業一覧
    public function showCurriculumList()
    {
        return view('admin.culliculum_list');
    }

    // 授業新規登録画面
    public function showCurriculumCreate()
    {
        return view('admin.culliculum_create');
    }

    // 授業新規登録処理
    public function store(Request $request)
    {
        // DB連携後に実装
    }
}