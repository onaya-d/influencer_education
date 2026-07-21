<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>

<header>

    <div class="menu">

        <a href="#">時間割</a>

        <a href="#">授業進捗</a>

        <a href="#">プロフィール設定</a>

    </div>

    <a href="#" class="logout">ログアウト</a>

</header>

<div class="container">

    @yield('content')

</div>

</body>
</html>