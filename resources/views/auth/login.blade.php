{{-- resources/views/auth/login.blade.php --}}

<div class="login-container" style="text-align: center; margin-top: 100px; font-family: 'Helvetica Neue', Arial, sans-serif;">
    
    <!-- メメインフォームエリア -->
    <div style="display: inline-block; text-align: left; width: 100%; max-width: 500px; box-sizing: border-box; padding: 0 10px;">
        
        <!-- 新規会員登録はこちら：ブロックごと右寄せ -->
        <div class="register-link" style="text-align: right; width: 100%; margin-bottom: 40px;">
            <a href="{{ route('user.show.register') }}" style="color: #888888; text-decoration: underline; font-size: 14px; display: inline-block;">新規会員登録はこちら</a>
        </div>
        
        <!-- タイトル -->
        <h2 style="font-size: 34px; margin-top: 0; margin-bottom: 65px; color: #888888; font-weight: normal; text-align: center; letter-spacing: 2px;">ログイン</h2>

        <!-- novalidate を追加してブラウザ独自のチェックを完全にオフにします -->
        <form action="{{ url('/login') }}" method="POST" style="margin: 0; padding: 0;" novalidate>
            @csrf

            <!-- メールアドレス入力欄（requiredを削除、左寄せ） -->
            <div style="margin-bottom: 5px; display: flex; align-items: center;">
                <label for="email" style="width: 140px; color: #888888; font-size: 15px; font-weight: 600; flex-shrink: 0;">メールアドレス <span style="color: #e53e3e;">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com"
                       style="flex-grow: 1; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 6px; color: #333333; background-color: #ffffff; font-size: 15px; box-sizing: border-box; outline: none; text-align: left;">
            </div>
            <!-- メールアドレスのエラーメッセージを表示する場所 -->
            @error('email')
                <div style="color: #e53e3e; font-size: 13px; margin-bottom: 20px; text-align: left; padding-left: 140px;">{{ $message }}</div>
            @enderror
            @if(!$errors->has('email'))
                <div style="margin-bottom: 25px;"></div>
            @endif

            <!-- パスワード入力欄（requiredを削除、左寄せ） -->
            <div style="margin-bottom: 5px; display: flex; align-items: center;">
                <label for="password" style="width: 140px; color: #888888; font-size: 15px; font-weight: 600; flex-shrink: 0;">パスワード <span style="color: #e53e3e;">*</span></label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                       style="flex-grow: 1; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 6px; color: #333333; background-color: #ffffff; font-size: 15px; box-sizing: border-box; outline: none; text-align: left;">
            </div>
            <!-- パスワードのエラーメッセージを表示する場所 -->
            @error('password')
                <div style="color: #e53e3e; font-size: 13px; margin-bottom: 25px; text-align: left; padding-left: 140px;">{{ $message }}</div>
            @enderror
            @if(!$errors->has('password'))
                <div style="margin-bottom: 45px;"></div>
            @endif

            <!-- ログインボタン -->
            <div style="text-align: center;">
                <button type="submit" style="background-color: #f06343; color: #ffffff; padding: 12px 45px; display: inline-block; border: none; border-radius: 6px; font-size: 20px; cursor: pointer; font-weight: normal; box-shadow: 0 2px 4px rgba(240, 99, 67, 0.2); transition: background-color 0.2s; letter-spacing: 1px;">
                    ログイン
                </button>
            </div>
        </form>
    </div>
</div>