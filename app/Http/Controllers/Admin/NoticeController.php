<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
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

    public function create()
    {
        return view('admin.notice_edit', [
            'article' => null,
        ]);
    }

    public function edit(int $id)
    {
        $article = Article::findOrFail($id);

        return view('admin.notice_edit', [
            'article' => $article,
        ]);
    }

    public function store(NoticeRequest $request)
    {
        $validated = $request->validated();

        Article::create($validated);

        return redirect()
            ->route('admin.notice.list')
            ->with('success', 'お知らせを登録しました。');
    }

    public function update(NoticeRequest $request, int $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->update($validated);

        return redirect()
            ->route('admin.notice.list')
            ->with('success', 'お知らせを更新しました。');
    }

    public function destroy(int $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()
            ->route('admin.notice.list')
            ->with('success', 'お知らせを削除しました。');
    }
}