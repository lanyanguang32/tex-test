<?php

namespace App\Http\Requests\Api;

class CompanyUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^1[34578]\d{9}$/|unique:users,phone',
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

    public function messages()
    {
        return [
            'phone.unique' => '手机号已被占用，请重新填写',
            'phone.regex' => '手机号无效。',
            'phone.required' => '手机号不能为空。',
            'name.required' => '用户名不能为空。',
        ];
    }
}
