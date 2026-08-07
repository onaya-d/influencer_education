<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>お知らせ</title>

    <link rel="stylesheet" href="{{ asset('css/user/notice.css') }}">
</head>

<body>

<header class="header">

    <nav class="header-menu">
        <a href="{{ route('home') }}" class="header-button">
            時間割
        </a>

        <a href="{{ route('user.progress') }}" class="header-button">
            授業進捗
        </a>

        <a href="#" class="header-button profile-button">
            プロフィール設定
        </a>
    </nav>

    <a href="{{ route('logout') }}" class="logout-link">
        ログアウト
    </a>

</header>

<main class="notice-page">

    <a href="javascript:history.back()" class="back-link">
        ←戻る
    </a>

    <section class="notice-area">

        <p class="notice-date">
            {{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}
        </p>

        <h1 class="notice-title">
            {{ $article->title }}
        </h1>

        <div class="notice-body">{{ $article->article_contents }}</div>

    </section>

</main>

</body>

</html>