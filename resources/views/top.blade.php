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
            /* スクロールバーを非表示にする設定 */
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
    color: #000000;       /* 文字色を「黒」に統一 */
    background-color: #ffffff; /* 背景色を「白」に統一 */
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

        /* お知らせエリアのスタイル */
        .news-section {
            text-align: left;
            margin-top: 20px;
        }
        .news-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #555555;
        }
        .news-table {
            width: 100%;
            border-collapse: collapse;
        }
        .news-table td {
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 15px;
        }
        .news-date {
            width: 150px;
            color: #888888;
        }
        .news-text {
            color: #333333;
        }
    </style>
</head>
<body>

    <!-- 共通ヘッダー -->
    <div class="header-menu">
        <div class="nav-links">
            <div>時間割</div>
            <div>授業進捗</div>
            <div style="background-color: #00a3a3;">プロフィール設定</div>
        </div>
        <a href="#" class="logout-btn">ログアウト</a>
    </div>

    <div class="container">
        
        <!-- バナー画像スライダー -->
        <div class="slider-wrapper">
            <div class="slider-container" id="slider">
                <!-- あとで画像を使う時は <img src="画像のパス"> に差し替えてください -->
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
            <table class="news-table">
                <tr>
                    <td class="news-date">2023年7月23日</td>
                    <td class="news-text">ここにお知らせのタイトルがはいります</td>
                </tr>
                <tr>
                    <td class="news-date">2023年7月23日</td>
                    <td class="news-text">ここにお知らせのタイトルがはいります</td>
                </tr>
                <tr>
                    <td class="news-date">2023年7月23日</td>
                    <td class="news-text">ここにお知らせのタイトルがはいります</td>
                </tr>
                <tr>
                    <td class="news-date">2023年7月23日</td>
                    <td class="news-text">ここにお知らせのタイトルがはいります</td>
                </tr>
                <tr>
                    <td class="news-date">2023年7月23日</td>
                    <td class="news-text">ここにお知らせのタイトルがはいります</td>
                </tr>
            </table>
        </div>

    </div>

    <!-- ドットをクリックしたときにスライドさせるための簡単なJavaScript -->
    <script>
        function scrollToSlide(index) {
            const slider = document.getElementById('slider');
            const slideWidth = slider.clientWidth;
            slider.scrollTo({
                left: slideWidth * index,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>