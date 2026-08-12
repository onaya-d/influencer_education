<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $article ? 'お知らせ変更' : 'お知らせ新規登録' }}
    </title>

    <link rel="stylesheet" href="{{ asset('css/admin/notice_edit.css') }}">
</head>

<body>

<header class="header">
    <nav class="header-menu">
        <span class="header-button">
            授業管理
        </span>

        <a href="{{ route('admin.notice.list') }}" class="header-button">
            お知らせ管理
        </a>

        <span class="header-button">
            バナー管理
        </span>
    </nav>

    <a href="{{ route('logout') }}" class="logout-link">
        ログアウト
    </a>
</header>

<main class="notice-page">

    <a href="{{ route('admin.notice.list') }}" class="back-link">
        ←戻る
    </a>

    <h1 class="page-title">
        {{ $article ? 'お知らせ変更' : 'お知らせ新規登録' }}
    </h1>

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ $article
            ? route('admin.notice.update', $article->id)
            : route('admin.notice.store') }}"
        method="POST"
        class="notice-form"
    >
        @csrf

        @if ($article)
            @method('PUT')
        @endif

        <div class="form-row">
            <label for="posted_date">
                投稿日時
            </label>

            <input
                type="date"
                id="posted_date"
                name="posted_date"
                value="{{ old(
                    'posted_date',
                    $article && $article->posted_date
                        ? $article->posted_date->format('Y-m-d')
                        : ''
                ) }}"
            >
        </div>

        <div class="form-row">
            <label for="title">
                タイトル
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $article?->title) }}"
            >
        </div>

        <div class="form-row textarea-row">
            <label for="article_contents">
                本文
            </label>

            <textarea
                id="article_contents"
                name="article_contents"
            >{{ old('article_contents', $article?->article_contents) }}</textarea>
        </div>

        <button type="submit" class="submit-button">
            登録
        </button>
    </form>

</main>

</body>

</html>