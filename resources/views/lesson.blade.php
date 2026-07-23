<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>授業詳細（動画配信）</title>
    @vite(['resources/css/app.css'])
</head>
<body>

    <!-- 共通ヘッダー -->
    <div class="header-menu">
        <div class="nav-links">
            <a href="{{ url()->current() }}" style="text-decoration: none; color: white;"><div>時間割</div></a>
            <a href="{{ url()->current() }}" style="text-decoration: none; color: white;"><div>授業進捗</div></a>
            <a href="{{ url()->current() }}" style="text-decoration: none; color: white;"><div style="background-color: #00a3a3;">プロフィール設定</div></a>
        </div>
        <a href="/logout" class="logout-btn" style="color: #000000; text-decoration: none;">ログアウト</a>
    </div>

    <div class="container">
        <!-- 成功時のフラッシュメッセージ表示エリア -->
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- 戻るボタン -->
        <a href="{{ route('home') }}" class="back-link">←戻る</a>

        <!-- メインの左右レイアウト -->
        <div class="content-wrapper">
            <!-- 左：動画プレイヤー（テスト用に条件分岐を一時無効化） -->
            <div class="video-container">
                <!-- テスト用の動画URLを直接指定してプレイヤーを常に表示 -->
                <video controls width="100%" height="100%" style="object-fit: contain;">
                    <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4" type="video/mp4">
                    お使いのブラウザは動画配信に対応していません。
                </video>
            </div>

            <!-- 右：受講完了ボタン -->
            <div class="action-container">
                <form action="{{ route('lessons.complete', $lesson->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="submit-btn">受講しました</button>
                </form>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #cbd5e1; margin: 30px 0;">

        <!-- 下：講座の情報-->
        <div class="info-section">
            <div class="category-tag">{{ $lesson->category ?? '小学校1年生' }}</div>
            <h1 class="lesson-title">{{ $lesson->title }}</h1>
            
            <div class="lesson-description-title">講座内容</div>
            <div class="lesson-description-text">
                {!! nl2br(e($lesson->description)) !!}
            </div>
        </div>
    </div>

</body>
</html>