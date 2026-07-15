<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start_date.*' => 'required',
            'start_time.*' => 'required',
            'end_date.*'   => 'required',
            'end_time.*'   => 'required',
        ];
    }
}