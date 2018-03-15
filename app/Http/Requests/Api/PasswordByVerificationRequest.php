<?php

namespace App\Http\Requests\Api;

class PasswordByVerificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'verification_key' => 'required|string',
            'verification_code' => 'required|string',
            'password' => 'required|string|min:6',

        ];
    }

    public function attributes()
    {
        return [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
        ];
    }
}
