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
    {{-- 共通レイアウト完成後は @extends('admin.layouts.app') と @section('content') に置き換え --}}
    <header>
        <nav>
            <a href="#">授業管理</a>
            <a href="#">お知らせ管理</a>
            <a href="#">バナー管理</a>
        </nav>
        <a href="#" class="logout">ログアウト</a>
    </header>

    <div class="container">
        <a href="{{ route('admin.show.curriculum.list') }}" class="back-link">←戻る</a>
        <h1>配信日時設定</h1>

        <p class="curriculum-title">授業タイトルが入る</p>
        {{-- DB連携後は以下を使用 --}}
        {{-- <p class="curriculum-title">{{ $curriculum->title }}</p> --}}
        <form method="POST" action="{{ route('admin.delivery.store', ['id' => 1]) }}">
        {{-- DB連携後は以下を使用 --}}
        {{-- <form method="POST" action="{{ route('admin.delivery.store', ['id' => $curriculum->id]) }}"> --}}
            @csrf

            @error('start_date.0')
                <p class="error-msg">開始日を入力してください。</p>
            @enderror

            @error('start_time.0')
                <p class="error-msg">開始時間を入力してください。</p>
            @enderror

            @error('end_date.0')
                <p class="error-msg">終了日を入力してください。</p>
            @enderror

            @error('end_time.0')
                <p class="error-msg">終了時間を入力してください。</p>
            @enderror
            
            <div class="delivery-list" id="delivery-list">
                {{-- 1行目（入力済み仮データ） --}}
                <div class="delivery-row">
                    <input type="text" name="start_date[]" value="20230713" placeholder="年月日">
                    <input type="text" name="start_time[]" value="1230" placeholder="日時">
                    <span class="tilde">〜</span>
                    <input type="text" name="end_date[]" value="20230714" placeholder="年月日">
                    <input type="text" name="end_time[]" value="1230" placeholder="日時">
                    <button type="button" class="btn-minus">－</button>
                </div>

                {{-- 2行目（空） --}}
                <div class="delivery-row">
                    <input type="text" name="start_date[]" placeholder="年月日">
                    <input type="text" name="start_time[]" placeholder="日時">
                    <span class="tilde">〜</span>
                    <input type="text" name="end_date[]" placeholder="年月日">
                    <input type="text" name="end_time[]" placeholder="日時">
                    <button type="button" class="btn-minus">－</button>
                </div>

                {{-- 3行目（空） --}}
                <div class="delivery-row">
                    <input type="text" name="start_date[]" placeholder="年月日">
                    <input type="text" name="start_time[]" placeholder="日時">
                    <span class="tilde">〜</span>
                    <input type="text" name="end_date[]" placeholder="年月日">
                    <input type="text" name="end_time[]" placeholder="日時">
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

        // 登録ボタンを押した時のバリデーション
        document.querySelector('.btn-submit').addEventListener('click', function(e) {
                const rows = document.querySelectorAll('.delivery-row');
                let hasError = false;

                rows.forEach(function(row) {
                    const inputs = row.querySelectorAll('input[type="text"]');
                    const values = Array.from(inputs).map(input => input.value.trim());
        
                    // 一部だけ入力されている場合はエラー
                    const filledCount = values.filter(v => v !== '').length;
                    if (filledCount > 0 && filledCount < 4) {
                        hasError = true;
                        row.querySelectorAll('input[type="text"]').forEach(input => {
                            if (input.value.trim() === '') {
                                input.style.borderColor = 'red';
                            }
                        });
                    } else {
                        row.querySelectorAll('input[type="text"]').forEach(input => {
                            input.style.borderColor = '';
                        });
                    }
                });

                if (hasError) {
                    e.preventDefault();
                    alert('入力途中の行があります。全ての項目を入力してください。');
                }
            });
    </script>

</body>
</html>