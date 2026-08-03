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
        <h1>授業設定</h1>

    <form method="POST" action="{{ route('admin.show.curriculum.create') }}" enctype="multipart/form-data">
        @csrf

        {{-- サムネイル --}}
        <div class="form-group thumbnail-group">
            <img id="thumbnail-preview" src="https://via.placeholder.com/120x90" alt="サムネイル"               class="thumbnail-preview">
            <div class="thumbnail-right">
                <p>サムネイル</p>
                <input type="file" name="image" id="image-input">
                @error('image')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- 学年 --}}
        <div class="form-group">
            <label>学年</label>
            <select name="grade">
                <option value="">選択してください</option>
                <option value="1" {{ old('grade') == '1' ? 'selected' : '' }}>小学校１年生</option>
                <option value="2" {{ old('grade') == '2' ? 'selected' : '' }}>小学校２年生</option>
                <option value="3" {{ old('grade') == '3' ? 'selected' : '' }}>小学校３年生</option>
                <option value="4" {{ old('grade') == '4' ? 'selected' : '' }}>小学校４年生</option>
                <option value="5" {{ old('grade') == '5' ? 'selected' : '' }}>小学校５年生</option>
                <option value="6" {{ old('grade') == '6' ? 'selected' : '' }}>小学校６年生</option>
                <option value="7" {{ old('grade') == '7' ? 'selected' : '' }}>中学校１年生</option>
                <option value="8" {{ old('grade') == '8' ? 'selected' : '' }}>中学校２年生</option>
                <option value="9" {{ old('grade') == '9' ? 'selected' : '' }}>中学校３年生</option>
                <option value="10" {{ old('grade') == '10' ? 'selected' : '' }}>高校１年生</option>
                <option value="11" {{ old('grade') == '11' ? 'selected' : '' }}>高校２年生</option>
                <option value="12" {{ old('grade') == '12' ? 'selected' : '' }}>高校３年生</option>
            </select>
            @error('grade')
                <p class="error-msg">学年を選択してください。</p>
            @enderror
        </div>
        {{-- DB連携後は以下を使用（DBから学年一覧を取得） --}}
        {{-- @foreach ($grades as $grade) --}}
        {{--     <option value="{{ $grade->id }}" {{ old('grade') == $grade->id ? 'selected' : '' }}>{{ $grade->name }} </option> --}}
        {{-- @endforeach --}}

        {{-- 授業名 --}}
        <div class="form-group">
            <label>授業名</label>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        {{-- 動画URL --}}
        <div class="form-group">
            <label>動画URL</label>
            <input type="text" name="movie_url" value="{{ old('movie_url') }}">
            @error('movie_url')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        {{-- 授業概要 --}}
        <div class="form-group">
            <label>授業概要</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-msg">授業概要を入力してください。</p>
            @enderror
        </div>

        {{-- 常時公開 --}}
    <div class="form-group checkbox-group">
        <input type="checkbox" name="is_public" id="is_public"
            {{-- DB連携後は以下を使用 --}}
            {{-- {{ old('is_public') ? 'checked' : '' }} --}}
        >
        <label for="is_public">常時公開</label>
    </div>

        {{-- 登録ボタン --}}
        <div class="form-group btn-area">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>

    <script src="{{ asset('js/admin_culliculum_create.js') }}"></script>

</body>
</html>