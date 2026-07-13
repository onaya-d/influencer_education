<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // 誰でもログインできるように true にします
    }

    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:32'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'メールアドレスを入力してください。',
            'email.email'       => '有効なメールアドレスの形式で入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.min'      => 'パスワードは半角英数字8〜32文字で入力してください。',
            'password.max'      => 'パスワードは半角英数字8〜32文字で入力してください。',
        ];
    }
}