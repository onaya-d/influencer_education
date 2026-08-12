<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class NoticeController extends Controller
{
    public function index()
    {
        $articles = Article::getNoticeList();

        return view('admin.notice_list', [
            'articles' => $articles,
        ]);
    }
}