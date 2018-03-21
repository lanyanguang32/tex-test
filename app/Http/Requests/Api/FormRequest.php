<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest as BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator) 
    { 
    	throw new HttpResponseException(response()->json([
        	'message' => '客户端请求参数错误',
        	'errors' => $validator->errors(),
            'status_code' => 422,
    	], 200)); 
    }
}
