<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'grade'       => 'required',
            'title'       => 'required|max:255',
            'movie_url'   => 'required|url|max:255',
            'description' => 'required',
        ];
    }

    // エラーメッセージ
    public function messages()
    {
        return [
            // サムネイルに関するエラーメッセージ
            'image.required' => 'サムネイルを選択してください',
            'image.image'    => 'サムネイルの形式はjpeg・png・jpgを選択してください',
            'image.mimes'    => 'サムネイルの形式はjpeg・png・jpgを選択してください',
            'image.max'      => 'サムネイルは2MB以内のサイズを選択してください',

            // 授業名に関するエラーメッセージ
            'title.required' => '授業名を入力してください',
            'title.max'      => '授業名は255文字以内で入力してください',

            // 動画URLに関するエラーメッセージ
            'movie_url.required' => '動画URLを入力してください',
            'movie_url.url'      => '動画URLを正しい形式で入力してください',
        ];
    }
}