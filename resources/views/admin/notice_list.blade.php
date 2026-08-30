<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>お知らせ一覧</title>

    <link rel="stylesheet" href="{{ asset('css/admin/notice_list.css') }}">
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

    <a href="javascript:history.back()" class="back-link">
        ←戻る
    </a>

    <h1 class="page-title">
        お知らせ一覧
    </h1>

    @if (session('success'))
        <p class="success-message">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('admin.notice.create') }}" class="create-button">
        新規登録
    </a>

    <div class="notice-table">

        <div class="table-header">
            <div class="date-column">
                投稿日時
            </div>

            <div class="title-column">
                タイトル
            </div>

            <div class="action-column"></div>
        </div>

        @forelse ($articles as $article)

            <div class="table-row">

                <div class="date-column">
                    {{ $article->posted_date->format('Y年n月j日') }}
                </div>

                <div class="title-column">
                    {{ $article->title }}
                </div>

                <div class="action-column">

                    <a
                        href="{{ route('admin.notice.edit', $article->id) }}"
                        class="edit-button"
                    >
                        変更する
                    </a>

                    <form
                        action="{{ route('admin.notice.destroy', $article->id) }}"
                        method="POST"
                        class="delete-form"
                        onsubmit="return confirm('このお知らせを削除してもよろしいですか？');"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-button">
                            削除
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <p class="empty-message">
                お知らせは登録されていません。
            </p>

        @endforelse

    </div>

</main>

</body>

</html>