<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'posted_date' => [
                    'required',
                    'date',
                ],
                'title' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'article_contents' => [
                    'required',
                    'string',
                ],
            ],
            [
                'posted_date.required' => '投稿日時を入力してください。',
                'posted_date.date' => '投稿日時の形式が正しくありません。',
                'title.required' => 'タイトルを入力してください。',
                'title.max' => 'タイトルは255文字以内で入力してください。',
                'article_contents.required' => '本文を入力してください。',
            ]
        );

        Article::create($validated);

        return redirect()
            ->route('admin.notice.list')
            ->with('success', 'お知らせを登録しました。');
    }

    public function update(Request $request, int $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate(
            [
                'posted_date' => [
                    'required',
                    'date',
                ],
                'title' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'article_contents' => [
                    'required',
                    'string',
                ],
            ],
            [
                'posted_date.required' => '投稿日時を入力してください。',
                'posted_date.date' => '投稿日時の形式が正しくありません。',
                'title.required' => 'タイトルを入力してください。',
                'title.max' => 'タイトルは255文字以内で入力してください。',
                'article_contents.required' => '本文を入力してください。',
            ]
        );

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