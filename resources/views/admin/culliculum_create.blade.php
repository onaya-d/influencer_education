<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授業設定</title>
    <link rel="stylesheet" href="{{ asset('css/admin_culliculum_create.css') }}">
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
        <h1>授業設定</h1>

        <form>
            {{-- サムネイル --}}
            <div class="form-group thumbnail-group">
                <img src="https://via.placeholder.com/120x90" alt="サムネイル" class="thumbnail-preview">
                <div class="thumbnail-right">
                    <p>サムネイル</p>
                    <input type="file" name="image">
                </div>
            </div>

            {{-- 学年 --}}
            <div class="form-group">
                <label>学年</label>
                <select name="grade">
                    <option>小学校１年生</option>
                    <option>小学校２年生</option>
                    <option>小学校３年生</option>
                    <option>小学校４年生</option>
                    <option>小学校５年生</option>
                    <option>小学校６年生</option>
                    <option>中学校１年生</option>
                    <option>中学校２年生</option>
                    <option>中学校３年生</option>
                    <option>高校１年生</option>
                    <option>高校２年生</option>
                    <option>高校３年生</option>
                </select>
            </div>

            {{-- 授業名 --}}
            <div class="form-group">
                <label>授業名</label>
                <input type="text" name="title">
            </div>

            {{-- 動画URL --}}
            <div class="form-group">
                <label>動画URL</label>
                <input type="text" name="movie_url">
            </div>

            {{-- 授業概要 --}}
            <div class="form-group">
                <label>授業概要</label>
                <textarea name="description"></textarea>
            </div>

            {{-- 常時公開 --}}
            <div class="form-group checkbox-group">
                <input type="checkbox" name="is_public" id="is_public">
                <label for="is_public">常時公開</label>
            </div>

            {{-- 登録ボタン --}}
            <div class="form-group btn-area">
                <button type="submit" class="btn-submit">登録</button>
            </div>
        </form>
    </div>

</body>
</html>