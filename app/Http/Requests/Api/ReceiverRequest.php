<?php

namespace App\Http\Requests\Api;

class ReceiverRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
            'province' => 'required',
            'city' => 'required',
            'area' => 'required',
        ];
    }
}
