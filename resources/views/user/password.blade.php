<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>パスワード変更</title>

    <link rel="stylesheet" href="{{ asset('css/user/password.css') }}">
</head>

<body>

<header class="header">

    <div class="header-menu">
        <a href="{{ route('home') }}" class="header-button">
            時間割
        </a>

        <a href="{{ route('user.progress') }}" class="header-button">
            授業進捗
        </a>

        <a href="{{ route('user.profile') }}" class="header-button profile-button">
            プロフィール設定
        </a>
    </div>

    <a href="{{ route('logout') }}" class="logout-link">
        ログアウト
    </a>

</header>

<main class="password-page">

    <a href="javascript:history.back()" class="back-link">
        ←戻る
    </a>

    <h1 class="page-title">
        パスワード変更
    </h1>

    @if(session('success'))
        <p class="success-message">
            {{ session('success') }}
        </p>
    @endif

    @if($errors->any())
        <div class="error-message">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('user.password.update') }}"
        method="POST"
        class="password-form">

        @csrf

        <div class="form-row">
            <label for="old_password">
                旧パスワード
            </label>

            <input
                type="password"
                id="old_password"
                name="old_password">
        </div>

        <div class="form-row">
            <label for="password">
                新パスワード
            </label>

            <input
                type="password"
                id="password"
                name="password">
        </div>

        <div class="form-row">
            <label for="password_confirmation">
                新パスワード確認
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation">
        </div>

        <button
            type="submit"
            class="submit-button">
            登録
        </button>

    </form>

</main>

</body>

</html>