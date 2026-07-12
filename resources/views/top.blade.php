{{-- resources/views/top.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>トップ画面</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #888888;
        }
        /* ヘッダーの簡易スタイル */
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
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* バナー画像スライダーのスタイル */
        .slider-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 0 auto 20px auto;
        }
        .slider-container {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #ffffff;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .slider-container::-webkit-scrollbar {
            display: none;
        }
        .slide-item {
            flex-shrink: 0;
            width: 100%;
            height: 250px;
            scroll-snap-align: start;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
            color: #000000;
            background-color: #ffffff;
        }

        /* ドットナビゲーション */
        .dots-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
        }
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #cbd5e1;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .dot:hover {
            background-color: #888888;
        }

        /* お知らせエリア全体のスタイル */
        .news-section {
            text-align: left;
            margin-top: 40px;
        }
        .news-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #555555;
        }
        /* お知らせの枠線スタイル */
        .news-border-box {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 20px;
            background-color: #ffffff;
        }
        .news-table {
            width: 100%;
            border-collapse: collapse;
        }
        /* 一番下のお知らせだけ線がいらないので調整 */
        .news-table tr:last-child td {
            border-bottom: none;
        }
        .news-table td {
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 15px;
        }
    </style>
</head>
<body>

   <!-- 共通ヘッダー -->
    <div class="header-menu">
        <div class="nav-links">
            <a href="/timetable" style="text-decoration: none; color: white;"><div>時間割</div></a>
            <a href="/progress" style="text-decoration: none; color: white;"><div>授業進捗</div></a>
            <a href="/profile" style="text-decoration: none; color: white;"><div style="background-color: #00a3a3;">プロフィール設定</div></a>
        </div>
        <!-- ログアウトボタン（黒文字） -->
        <a href="/logout" class="logout-btn" style="color: #000000; text-decoration: none;">ログアウト</a>
    </div>

    <div class="container">
        
        <!-- バナー画像スライダー -->
        <div class="slider-wrapper">
            <div class="slider-container" id="slider">
                <div class="slide-item" id="slide-1">バナー画像</div>
                <div class="slide-item" id="slide-2">バナー画像</div>
                <div class="slide-item" id="slide-3">バナー画像</div>
                <div class="slide-item" id="slide-4">バナー画像</div>
            </div>
        </div>

        <!-- 4つのドットボタン -->
        <div class="dots-container">
            <div class="dot" onclick="scrollToSlide(0)"></div>
            <div class="dot" onclick="scrollToSlide(1)"></div>
            <div class="dot" onclick="scrollToSlide(2)"></div>
            <div class="dot" onclick="scrollToSlide(3)"></div>
        </div>

        <!-- お知らせエリア -->
        <div class="news-section">
            <h2 class="news-title">お知らせ</h2>
            
            <!-- 極限まで隙間を詰めた、外枠だけのシンプルな角丸白ボックス -->
            <div class="news-border-box" style="border: 1px solid #cbd5e1; border-radius: 8px; padding: 5px 15px; background-color: #ffffff;">
                <table class="news-table" style="width: 100%; border-collapse: collapse; line-height: 1.2;">
                    <tr>
                        <td class="news-date" style="padding: 4px 0; color: #000000; width: 130px; font-weight: bold; border: none; font-size: 14px;">2023年7月23日</td>
                        <td class="news-text" style="padding: 4px 0; color: #000000; border: none; font-size: 14px;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr>
                        <td class="news-date" style="padding: 4px 0; color: #000000; font-weight: bold; border: none; font-size: 14px;">2023年7月23日</td>
                        <td class="news-text" style="padding: 4px 0; color: #000000; border: none; font-size: 14px;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr>
                        <td class="news-date" style="padding: 4px 0; color: #000000; font-weight: bold; border: none; font-size: 14px;">2023年7月23日</td>
                        <td class="news-text" style="padding: 4px 0; color: #000000; border: none; font-size: 14px;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr>
                        <td class="news-date" style="padding: 4px 0; color: #000000; font-weight: bold; border: none; font-size: 14px;">2023年7月23日</td>
                        <td class="news-text" style="padding: 4px 0; color: #000000; border: none; font-size: 14px;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr>
                        <td class="news-date" style="padding: 4px 0; color: #000000; font-weight: bold; border: none; font-size: 14px;">2023年7月23日</td>
                        <td class="news-text" style="padding: 4px 0; color: #000000; border: none; font-size: 14px;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                </table>
            </div>
            
        </div>

    </div>
</html>