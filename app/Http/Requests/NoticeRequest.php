<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
        return [
            'posted_date' => [
                'required',
                'date',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'article_contents' => [
                'required',
                'string',
            ],
        ];
    }

    /**
     * Get the custom validation messages.
     */
    public function messages(): array
    {
        return [
            'posted_date.required' => '投稿日時を入力してください。',
            'posted_date.date' => '投稿日時の形式が正しくありません。',

            'title.required' => 'タイトルを入力してください。',
            'title.string' => 'タイトルは文字列で入力してください。',
            'title.max' => 'タイトルは255文字以内で入力してください。',

            'article_contents.required' => '本文を入力してください。',
            'article_contents.string' => '本文は文字列で入力してください。',
        ];
    }
}