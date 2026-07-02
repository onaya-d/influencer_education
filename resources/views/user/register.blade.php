<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー新規登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* 1. 全体のベースになる文字色を薄めのグレーにする */
body {
    color: #666666; /* 真っ黒じゃなく、少し抜けたグレー */
}

/* 2. 入力欄の左の文字（ラベル）をさらに薄いグレーにする */
.form-group label {
    color: #888888; 
    
/* 3. 入力欄の枠線をものすごく薄いグレーにする */
.form-control {
    border-color: #e0e0e0; /* 線の存在感をギリギリまで薄くしたグレー */
    color: #666666;
}

/* 4. 入力欄をクリックしたときの青い光を消す */
.form-control:focus {
    border-color: #cccccc; /* クリックしたときも優しいグレー */
    box-shadow: none;      /* Bootstrap特有の青いピカピカ光る線を消す現場の技 */
}
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7"> <div class="text-right mb-2">
                <a href="#" class="text-secondary small" style="text-decoration: underline;">ログインはこちら</a>
            </div>

            <div class="py-4">
    <h2 class="text-center mb-5 font-weight-normal" style="color: #555555;">新規会員登録</h2>
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label font-weight-bold">ユーザーネーム</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="name" class="form-control" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_kana" class="col-sm-4 col-form-label font-weight-bold">
                                カナ 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="name_kana" id="name_kana" class="form-control" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label font-weight-bold">
                                メールアドレス 
                            </label>
                            <div class="col-sm-8">
                                <input type="email" name="email" id="email" class="form-control" maxlength="255" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label font-weight-bold">
                                パスワード 
                            </label>
                            <div class="col-sm-8">
                                <input type="password" name="password" id="password" class="form-control" minlength="8" maxlength="32" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label font-weight-bold">
                                パスワード（確認） 
                            </label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="8" maxlength="32" required>
                            </div>
                        </div>

                        <div class="row mt-4 justify-content-center">
    <button type="submit" class="btn font-weight-bold text-white" style="background-color: #f06a4d; border-color: #f06a4d; width: 200px;">登録</button>
</div>

            </div>
        </div>
    </div>
</div>

</body>
</html>