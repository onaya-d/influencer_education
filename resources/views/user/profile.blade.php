<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>プロフィール変更</title>

    <link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
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

        <a href="{{ route('user.profile') }}" class="header-button profile-button">
            プロフィール設定
        </a>
    </nav>

    <a href="{{ route('logout') }}" class="logout-link">
        ログアウト
    </a>
</header>

<main class="profile-page">

    <a href="javascript:history.back()" class="back-link">
        ←戻る
    </a>

    <h1 class="profile-title">
        プロフィール変更
    </h1>

    @if (session('success'))
        <p class="success-message">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ route('user.profile.update') }}"
        method="POST"
        enctype="multipart/form-data"
        class="profile-form"
    >
        @csrf

        <div class="profile-image-section">
            <div class="profile-image-box">
                <img
                    src="{{ $user->profile_image
                        ? asset('storage/' . $user->profile_image)
                        : asset('images/no_image.png') }}"
                    alt="プロフィール画像"
                    class="profile-image"
                >
            </div>

            <div class="profile-image-control">
                <p class="profile-image-label">
                    プロフィール画像
                </p>

                <input
                    type="file"
                    name="profile_image"
                    accept="image/*"
                >
            </div>
        </div>

        <div class="form-row">
            <label for="name">
                ユーザーネーム
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
            >
        </div>

        <div class="form-row">
            <label for="kana">
                カナ
            </label>

            <input
                type="text"
                id="kana"
                name="kana"
                value="{{ old('kana', $user->kana) }}"
            >
        </div>

        <div class="form-row">
            <label for="email">
                メールアドレス
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
            >
        </div>

        <div class="form-row">
            <span class="password-label">
                パスワード
            </span>

            <a
                href="{{ route('user.password') }}"
                class="password-button"
            >
                パスワードを変更する
            </a>
        </div>

        <button type="submit" class="submit-button">
            登録
        </button>
    </form>

</main>

</body>

</html>