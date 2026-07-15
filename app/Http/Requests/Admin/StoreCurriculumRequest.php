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
}