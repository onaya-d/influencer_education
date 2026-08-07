<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;

class NoticeController extends Controller
{
    public function show(int $id)
    {
        $article = Article::findOrFail($id);

        return view('user.notice', [
            'article' => $article,
        ]);
    }
}