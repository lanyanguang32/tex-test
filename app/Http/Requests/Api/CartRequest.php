<?php

namespace App\Http\Requests\Api;

class CartRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku_id' => 'required|exists:skus,id',
            'price' => 'required',
            'num' => 'required',
            'shop_id' => 'required',
        ];
    }
}
