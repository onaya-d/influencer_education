<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $userId = session('profile_user_id');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'kana' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $userId,
            ],
            'profile_image' => [
                'nullable',
                'image',
                'max:2048',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'ユーザーネームを入力してください。',
            'name.string' => 'ユーザーネームは文字列で入力してください。',
            'name.max' => 'ユーザーネームは255文字以内で入力してください。',

            'kana.required' => 'カナを入力してください。',
            'kana.string' => 'カナは文字列で入力してください。',
            'kana.max' => 'カナは255文字以内で入力してください。',

            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'email.unique' => 'このメールアドレスはすでに使用されています。',

            'profile_image.image' => '画像ファイルを選択してください。',
            'profile_image.max' => 'プロフィール画像は2MB以下にしてください。',
        ];
    }
}