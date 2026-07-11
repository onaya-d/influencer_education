<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授業一覧</title>
    <link rel="stylesheet" href="{{ asset('css/admin_culliculum_list.css') }}">
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
        {{-- 戻るボタン（仮） --}}
        <a href="#">←戻る</a>
        <h1>授業一覧</h1>

        <div class="top-area">
            <a href="{{ route('admin.show.curriculum.create') }}" class="btn-primary">新規登録</a>
            <span class="grade-tab active">小学校１年生</span>
        </div>

        <div class="content-area">
            {{-- サイドバー --}}
            <div class="sidebar">
                <div class="sidebar-item">小学校2年生</div>
                <div class="sidebar-item">小学校3年生</div>
                <div class="sidebar-item">小学校4年生</div>
                <div class="sidebar-item">小学校5年生</div>
                <div class="sidebar-item">小学校6年生</div>
                <div class="sidebar-item middle">中学校１年生</div>
                <div class="sidebar-item middle">中学校２年生</div>
                <div class="sidebar-item middle">中学校３年生</div>
                <div class="sidebar-item green">高校１年生</div>
                <div class="sidebar-item green">高校２年生</div>
                <div class="sidebar-item green">高校３年生</div>
            </div>

            {{-- 授業カード一覧 --}}
            <div class="card-list">
                @for ($i = 0; $i < 6; $i++)
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" alt="授業画像">
                    <h3>授業タイトル</h3>
                    <p>7月13日　14:00 〜 15:00</p>
                    <p>7月13日　14:00 〜 15:00</p>
                    <p>7月13日　14:00 〜 15:00</p>
                    <p>7月13日　14:00 〜 15:00</p>
                    <div class="card-buttons">
                        <a href="{{ route('admin.show.curriculum.edit', ['id' => 1]) }}" 
                            class="btn-secondary">授業内容編集
                        </a>

                        <a href="{{ route('admin.show.delivery.edit', ['id' => 1]) }}" 
                            class="btn-secondary">配信日時編集
                        </a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

</body>
</html>