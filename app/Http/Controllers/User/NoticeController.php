<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * お知らせ詳細画面
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('user.notice', compact('article'));
    }
}