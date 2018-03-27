<?php

namespace App\Http\Requests\Api;

class CartEditRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required',
            'num' => 'required',
        ];
    }
}
