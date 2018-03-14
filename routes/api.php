<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace'=> 'App\Http\Controllers\Api\v1'], function ($api) {
    //测试
	$api->get('/test', 'ApiController@show');

    //图片验证码
    $api->post('passport/captcha', 'PassportController@postCaptcha');
    //短信验证码
    $api->post('passport/verificationCode', 'PassportController@postVerificationCode');
    //注册
    $api->post('passport/register', 'PassportController@postRegister');
    //登录
    $api->post('passport/login', 'PassportController@postLogin');





});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
