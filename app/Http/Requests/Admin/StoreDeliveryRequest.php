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
            'start_date.0' => 'required',
            'start_time.0' => 'required',
            'end_date.0'   => 'required',
            'end_time.0'   => 'required',
        ];
    }
}