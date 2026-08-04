<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>授業進捗</title>

    <link rel="stylesheet" href="{{ asset('css/user/progress.css') }}">
</head>

<body>

    <header class="header">
        <nav class="header-menu">
            <a href="{{ url('/home') }}" class="header-button">
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

    <main class="progress-page">

        <a href="javascript:history.back()" class="back-link">
            ←戻る
        </a>

        <section class="user-area">

            <div class="profile-image-area">
                <img
                    src="{{ asset('images/no_image.png') }}"
                    alt="プロフィール画像"
                    class="profile-image"
                >
            </div>

            <div class="user-information">
                <h1 class="progress-title">
                    {{ $user->name }}さんの授業進捗
                </h1>

                <div class="current-grade">
                    <span class="current-grade-label">
                        現在の学年：
                    </span>

                    <span class="current-grade-badge">
                        {{ $currentGradeName }}
                    </span>
                </div>
            </div>

        </section>

        <section class="grade-grid">

            @foreach ($gradeGroups as $gradeName => $curriculums)

                @php
                    $gradeClass = 'elementary-grade';

                    if (str_contains($gradeName, '中学')) {
                        $gradeClass = 'junior-grade';
                    } elseif (str_contains($gradeName, '高校')) {
                        $gradeClass = 'high-grade';
                    }
                @endphp

                <div class="grade-item">

                    <h2 class="grade-name {{ $gradeClass }}">
                        {{ $gradeName }}
                    </h2>

                    <div class="curriculum-list">

                        @forelse ($curriculums as $curriculum)

                            <div class="curriculum-row">

                                <span class="completed-area">
                                    @if (in_array($curriculum->id, $completedCurriculums))
                                        <span class="completed-label">
                                            受講済
                                        </span>
                                    @endif
                                </span>

                                <span class="curriculum-title">
                                    {{ $curriculum->title }}
                                </span>

                            </div>

                        @empty

                            <p class="empty-message">
                                授業はありません
                            </p>

                        @endforelse

                    </div>

                </div>

            @endforeach

        </section>

    </main>

</body>

</html>