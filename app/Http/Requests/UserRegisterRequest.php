<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * 認証のチェック（今回は一律trueで許可します）
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 設計書に基づいたバリデーションルール
     */
    public function rules(): array
    {
        return [
            'username'              => 'required',
            'kana'                  => 'required|regex:/^[ァ-ヶー]+$/u', // 全角カタカナの正規表現
            'email'                 => 'required|email|unique:users,email', // usersテーブルのemailカラムと重複チェック
            'password'              => 'required|alpha_num|min:8|max:32|confirmed', // alpha_numで半角英数字、confirmedで一致チェック
            'password_confirmation' => 'required', // 一致チェック用の確認パスワード項目
        ];
    }

    /**
     * 設計書に書かれているエラーメッセージの定義
     */
    public function messages(): array
    {
        return [
            // ユーザーネーム
            'username.required' => 'ユーザーネームを入力してください。',

            // カナ
            'kana.required'     => 'カナを入力してください。',
            'kana.regex'        => 'カナは全角カタカナで入力してください。',

            // メールアドレス
            'email.required'    => 'メールアドレスを入力してください。',
            'email.email'       => '正しいメールアドレスの形式で入力してください。',
            'email.unique'      => 'このメールアドレスは既に登録されています。',

            // パスワード
            'password.required'  => 'パスワードを入力してください。',
            'password.alpha_num' => 'パスワードは半角英数字8～32文字で入力してください。', // 複合的なメッセージなのでここに集約
            'password.min'       => 'パスワードは半角英数字8～32文字で入力してください。',
            'password.max'       => 'パスワードは半角英数字8～32文字で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            
            // 確認用パスワード
            'password_confirmation.required' => '上記のパスワードと一致しません。',
        ];
    }
}