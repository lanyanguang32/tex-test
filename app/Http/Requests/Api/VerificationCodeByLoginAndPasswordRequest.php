<?php

namespace App\Http\Requests\Api;

class VerificationCodeByLoginAndPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/^1[34578]\d{9}$/|exists:users',
        ];
    }

    public function messages()
    {
        return [
            'phone.exists' => '手机号不存在，请先注册。',
            'phone.regex' => '手机号无效。',
            'phone.required' => '手机号不能为空。',
        ];
    }
}
