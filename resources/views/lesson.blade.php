<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>授業詳細（動画配信）</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #888888;
        }
        /* 共通ヘッダー（トップ画面と統一） */
        .header-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f06343;
            padding: 15px 30px;
        }
        .nav-links div {
            display: inline-block;
            background-color: #008b8b;
            color: white;
            padding: 6px 15px;
            border-radius: 4px;
            margin-right: 10px;
            font-size: 14px;
        }
        .logout-btn {
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        /* メインコンテナ */
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 20px;
        }

        /* 戻るボタン */
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #555555;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        /* 2カラムレイアウト用のラッパー */
        .content-wrapper {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        /* 左側：動画エリア */
        .video-container {
            flex: 1.5; /* 左側を少し広く */
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 16 / 9; /* 16:9のアスペクト比を維持 */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        /* 簡易プレイヤー風の再生ボタン（仮） */
        .play-button {
            width: 80px;
            height: 80px;
            background-color: rgba(240, 99, 67, 0.9);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .play-button::after {
            content: '';
            display: block;
            border-left: 25px solid white;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            margin-left: 8px;
        }

        /* 右側：ボタンエリア */
        .action-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding-top: 50px; /* 位置の微調整 */
        }
        /* 受講しましたボタン */
        .submit-btn {
            background-color: #f06343;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s;
        }
        .submit-btn:hover {
            background-color: #d44d2d;
        }

        /* 下部：説明エリア */
        .info-section {
            margin-top: 20px;
        }
        /* カテゴリタグ */
        .category-tag {
            display: inline-block;
            background-color: #7dd3fc; /* スカイブルー */
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        /* 授業タイトル */
        .lesson-title {
            font-size: 24px;
            color: #333333;
            margin: 0 0 15px 0;
            font-weight: bold;
        }
        /* 講座内容 */
        .lesson-description-title {
            font-size: 16px;
            color: #555555;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .lesson-description-text {
            font-size: 14px;
            color: #666666;
            line-height: 1.6;
        }

        /* 成功メッセージの簡易スタイル */
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- 共通ヘッダー -->
    <div class="header-menu">
        <div class="nav-links">
            <a href="/home" style="text-decoration: none; color: white;"><div>時間割</div></a>
            <a href="/home" style="text-decoration: none; color: white;"><div>授業進捗</div></a>
            <a href="/home" style="text-decoration: none; color: white;"><div style="background-color: #00a3a3;">プロフィール設定</div></a>
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