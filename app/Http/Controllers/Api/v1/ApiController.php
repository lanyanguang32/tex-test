<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

class ApiController extends Controller
{
	use Helpers;
    
	public function show()
	{

		return 'hello';
	}

	//自定义错误
	public function errorCustom($errors, $message = '客户端请求参数错误', $status_code = 422)
	{
		return response()->json([
        	'message' => $message,
        	'errors' => $errors,
        	'status_code' => $status_code
		]);
	}
}
