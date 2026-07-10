<!<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>配信日時設定</title>
    <link rel="stylesheet" href="{{ asset('css/admin_delivery.css') }}">
</head>
<body>

    {{-- ヘッダー（仮） --}}
    <header>
        <nav>
            <a href="#">授業管理</a>
            <a href="#">お知らせ管理</a>
            <a href="#">バナー管理</a>
        </nav>
        <a href="#" class="logout">ログアウト</a>
    </header>

    <div class="container">
        <a href="#" class="back-link">←戻る</a>
        <h1>配信日時設定</h1>

        <p class="curriculum-title">授業タイトルが入る</p>

        <form method="POST" action="{{ route('admin.delivery.store') }}">
            @csrf
            
            <div class="delivery-list" id="delivery-list">
                {{-- 1行目（入力済み仮データ） --}}
                <div class="delivery-row">
                    <input type="text" value="20230713" placeholder="年月日">
                    <input type="text" value="1230" placeholder="日時">
                    <span class="tilde">〜</span>
                    <input type="text" value="20230714" placeholder="年月日">
                    <input type="text" value="1230" placeholder="日時">
                    <button type="button" class="btn-minus">－</button>
                </div>

                {{-- 2行目（空） --}}
                <div class="delivery-row">
                    <input type="text" placeholder="年月日">
                    <input type="text" placeholder="日時">
                    <span class="tilde">〜</span>
                    <input type="text" placeholder="年月日">
                    <input type="text" placeholder="日時">
                    <button type="button" class="btn-minus">－</button>
                </div>

                {{-- 3行目（空） --}}
                <div class="delivery-row">
                    <input type="text" placeholder="年月日">
                    <input type="text" placeholder="日時">
                    <span class="tilde">〜</span>
                    <input type="text" placeholder="年月日">
                    <input type="text" placeholder="日時">
                    <button type="button" class="btn-minus">－</button>
                </div>
            </div>

            {{-- 追加ボタン --}}
            <button type="button" class="btn-plus" id="btn-add">＋</button>

            {{-- 登録ボタン --}}
            <div class="btn-area">
                <button type="submit" class="btn-submit">登録</button>
            </div>
        </form>
    </div>

    <script>
        // ＋ボタンで行を追加
        document.getElementById('btn-add').addEventListener('click', function() {
            const list = document.getElementById('delivery-list');
            const row = document.createElement('div');
            row.className = 'delivery-row';
            row.innerHTML = `
                <input type="text" placeholder="年月日">
                <input type="text" placeholder="日時">
                <span class="tilde">〜</span>
                <input type="text" placeholder="年月日">
                <input type="text" placeholder="日時">
                <button type="button" class="btn-minus">－</button>
            `;
            list.appendChild(row);
        });

        // －ボタンで行を削除
        document.getElementById('delivery-list').addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-minus')) {
                e.target.parentElement.remove();
            }
        });
    </script>

</body>
</html>