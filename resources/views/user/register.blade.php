<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー新規登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body { color: #666666; }
        .form-group label { color: #888888; }
        .form-control { border-color: #e0e0e0; color: #666666; }
        .form-control:focus { border-color: #cccccc; box-shadow: none; }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7"> 
            <div class="text-right mb-2">
                <a href="#" class="text-secondary small" style="text-decoration: underline;">ログインはこちら</a>
            </div>

            <div class="py-4">
                <h2 class="text-center mb-5 font-weight-normal" style="color: #555555;">新規会員登録</h2>
                
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label font-weight-bold">ユーザーネーム</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                            @error('username')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name_kana" class="col-sm-4 col-form-label font-weight-bold">カナ</label>
                        <div class="col-sm-8">
                            <input type="text" name="kana" id="name_kana" class="form-control" value="{{ old('kana') }}">
                            @error('kana')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label font-weight-bold">メールアドレス</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label font-weight-bold">パスワード</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-4 col-form-label font-weight-bold">パスワード（確認）</label>
                        <div class="col-sm-8">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-center">
                        <button type="submit" class="btn font-weight-bold text-white" style="background-color: #f06a4d; border-color: #f06a4d; width: 200px;">登録</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

</body>
</html>