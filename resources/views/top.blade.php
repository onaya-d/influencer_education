<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップ画面</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #888888;
        }
        /* ヘッダーのスタイル（スマホ対応） */
        .header-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f06343;
            padding: 12px 15px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .nav-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .nav-links div {
            background-color: #008b8b;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 13px;
            white-space: nowrap;
        }
        .logout-btn {
            color: #ffffff !important;
            text-decoration: none;
            font-size: 14px;
            white-space: nowrap;
        }

        /* メインコンテナ */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 15px;
            box-sizing: border-box;
        }

        /* バナー画像スライダーのスタイル */
        .slider-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 0 auto 15px auto;
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
            height: 200px;
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
            margin-bottom: 30px;
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
            font-size: 18px;
            margin-bottom: 12px;
            color: #555555;
        }
        .news-border-box {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 5px 15px;
            background-color: #ffffff;
        }
        .news-table {
            width: 100%;
            border-collapse: collapse;
        }
        .news-table td {
            padding: 10px 0;
            font-size: 13px;
        }
        .news-date {
            width: 105px !important;
            flex-shrink: 0;
        }
        .news-text {
            word-break: break-all;
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
        <a href="/logout" class="logout-btn">ログアウト</a>
    </div>

    <div class="container">
        
        <!-- バナー画像スライダー -->
        <div class="slider-wrapper">
            <div class="slider-container" id="slider">
                <div class="slide-item" id="slide-1">バナー画像 1</div>
                <div class="slide-item" id="slide-2">バナー画像 2</div>
                <div class="slide-item" id="slide-3">バナー画像 3</div>
                <div class="slide-item" id="slide-4">バナー画像 4</div>
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
            
            <div class="news-border-box">
                <table class="news-table">
                    <tr class="announcement-row" data-id="1" style="cursor: pointer;">
                        <td class="news-date" style="color: #000000; font-weight: bold;">2023年7月23日</td>
                        <td class="news-text" style="color: #000000;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr class="announcement-row" data-id="2" style="cursor: pointer;">
                        <td class="news-date" style="color: #000000; font-weight: bold;">2023年7月23日</td>
                        <td class="news-text" style="color: #000000;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr class="announcement-row" data-id="3" style="cursor: pointer;">
                        <td class="news-date" style="color: #000000; font-weight: bold;">2023年7月23日</td>
                        <td class="news-text" style="color: #000000;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr class="announcement-row" data-id="4" style="cursor: pointer;">
                        <td class="news-date" style="color: #000000; font-weight: bold;">2023年7月23日</td>
                        <td class="news-text" style="color: #000000;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                    <tr class="announcement-row" data-id="5" style="cursor: pointer;">
                        <td class="news-date" style="color: #000000; font-weight: bold;">2023年7月23日</td>
                        <td class="news-text" style="color: #000000;">ここにお知らせのタイトルがはいります</td>
                    </tr>
                </table>
            </div>
            
        </div>

    </div>

    <script>
        // スライダー制御
        const slider = document.getElementById('slider');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;
        const totalSlides = 4;

        function scrollToSlide(index) {
            currentIndex = index;
            const slideWidth = slider.clientWidth;
            
            slider.scrollTo({
                left: slideWidth * index,
                behavior: 'smooth'
            });

            updateDots();
        }

        function updateDots() {
            dots.forEach((dot, idx) => {
                if (idx === currentIndex) {
                    dot.style.backgroundColor = '#888888';
                } else {
                    dot.style.backgroundColor = '#cbd5e1';
                }
            });
        }

        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            scrollToSlide(currentIndex);
        }, 3000);

        updateDots();

        // お知らせクリック制御
        document.querySelectorAll('.announcement-row').forEach(row => {
            row.addEventListener('click', () => {
                if (row.querySelector('.pending-msg')) return;

                const msg = document.createElement('span');
                msg.className = 'pending-msg';
                msg.innerText = ' （準備中）';
                msg.style.color = '#ff4d4f';
                msg.style.fontSize = '12px';
                msg.style.fontWeight = 'bold';
                msg.style.marginLeft = '10px';

                const textCell = row.querySelector('.news-text');
                textCell.appendChild(msg);
            });
        });
    </script>
</body>
</html>