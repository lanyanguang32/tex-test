<?php

namespace App\Http\Requests\Api;

class CartPaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cart_ids' => 'required',
            'payment' => 'required',
            'receiver_id' => 'required',
            'shop_id' => 'required',
        ];
    }
}
