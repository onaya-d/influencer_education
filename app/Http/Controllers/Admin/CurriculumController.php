<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    // 授業一覧
    public function index()
    {
        return view('admin.culliculum_list');
    }

    // 授業新規登録画面
    public function create()
    {
        return view('admin.culliculum_create');
    }

    // 授業編集画面
    public function edit($id)
    {
        return view('admin.culliculum_edit');
    }
}