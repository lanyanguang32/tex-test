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

    //登录相关

    //1 图片验证码
    $api->post('passport/captcha', 'PassportController@postCaptcha');
    //2 注册短信验证码
    $api->post('passport/verificationCode', 'PassportController@postVerificationCode');
    //3 注册
    $api->post('passport/register', 'PassportController@postRegister');
    //4 登录
    $api->post('passport/login', 'PassportController@postLogin');
    //5 第三方登录
    $api->post('passport/{social_type}/login', 'PassportController@postSocialLogin');
    //6 刷新token
    $api->post('passport/refreshToken', 'PassportController@postRefreshToken');
    //7 退出登录删除token
    $api->post('passport/logout', 'PassportController@postLogout');
    //8 登录和修改密码验证码
    $api->post('passport/verificationCodeByLoginAndPassword', 'PassportController@postVerificationCodeByLoginAndPassword');
    //9 短信登录
    $api->post('passport/loginByVerification', 'PassportController@postLoginByVerification');
    //10 短信修改密码
    $api->post('passport/passwordByVerification', 'PassportController@postPasswordByVerification');

    //首页

    //11 banner
    $api->get('home/banners', 'HomeController@getBanner');
    //12 推荐
    $api->get('home/recommends', 'HomeController@getRecommend');

    //分类
    //13 分类列表
    $api->get('category/tags', 'CategoryController@getTag');

    //商品
    //14 商品筛选
    $api->post('goods/find', 'GoodsController@postGoodsFind');
    //15 商品详情
    $api->get('goods/detail/{id}', 'GoodsController@getGoodsDetail');

    //3D
    //16 3D服装行业
    $api->get('3d/categories', 'WarpController@getCategories');
    //17 3D模特图片
    $api->get('3d/models', 'WarpController@getModels');
    //18 3D面料试衣
    $api->post('3d/warp', 'WarpController@postWarp');



});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
