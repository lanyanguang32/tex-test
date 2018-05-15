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
    // 店铺详情
    $api->get('shop/detail/{id}', 'GoodsController@getShopDetail');

    //3D
    //16 3D服装行业
    $api->get('3d/categories', 'WarpController@getCategories');
    //17 3D模特图片
    $api->get('3d/models', 'WarpController@getModels');
    //18 3D面料试衣
    $api->post('3d/warp', 'WarpController@postWarp');

    //? 店铺主页
    //?

    $api->group(['middleware' => 'api.auth'], function($api) {
    //需要授权
        //最近搜索
        //19 最近搜索产品列表
        $api->get('search/history', 'SearchController@getHistory');
        //20 添加最近搜索产品
        $api->post('search/history', 'SearchController@postHistory');
        //21 清空最近搜索产品
        $api->post('search/historyDel', 'SearchController@postHistoryDel');

        //购物车
        //22 历史购物车
        $api->get('cart/history', 'CartController@getCartHistory');
        //23 选择供应商
        $api->get('cart/shop', 'CartController@getCartShop');
        //24 添加型号
        $api->post('cart/sku', 'CartController@postCartSku');
        //25 编辑
        $api->post('cart/sku/{id}/edit', 'CartController@postCartSkuEdit');
        //26 删除
        $api->post('cart/sku/{id}/del', 'CartController@postCartSkuDel');
        //27 确认备货
        $api->post('cart/stock', 'CartController@postCartStock');
        //28 确认支付
        $api->post('cart/payment', 'CartController@postCartPayment');
        //29 购物车
        $api->get('cart/list', 'CartController@getCartList');

        //收货地址
        //30 收货地址
        $api->get('receiver/list', 'ReceiverController@getReceiverList');
        //31 新增
        $api->post('receiver', 'ReceiverController@postReceiver');
        //32 编辑
        $api->post('receiver/{id}/edit', 'ReceiverController@postReceiverEdit');
        //33 删除
        $api->post('receiver/{id}/del', 'ReceiverController@postReceiverDel');
        //34 设置为默认
        $api->post('receiver/{id}/def', 'ReceiverController@postReceiverDef');

        //订单
        //35 订单列表
        $api->get('order/list', 'OrderController@getOrderList');
        //36 发货
        $api->post('order/{id}/ship', 'OrderController@postOrderShip');
        //37 确认收货
        $api->post('order/{id}/comfirm', 'OrderController@postOrderConfirm');
        
        //小样
        //38 小样列表
         $api->get('texture/list', 'TextureController@getTextureList');
        //39 添加
        $api->post('texture/sku', 'TextureController@postTextureSku');
        //40 删除
        $api->post('texture/sku/{id}/del', 'TextureController@postTextureSkuDel');
        //41 提交
        $api->post('texture', 'TextureController@postTexture');

        //消息
         //消息统计
         $api->get('message/count', 'MessageController@getMessageCount');
         //42 消息列表
         $api->get('message/list', 'MessageController@getMessageList');
         //43 阅读消息
         $api->post('message/{id}/read', 'MessageController@postMessageRead');
         //44 删除消息
         $api->post('message/{id}/del', 'MessageController@postMessageDel');

         //通讯录
         //45 通讯录
         $api->get('contact/list', 'ContactController@getContactList');
         //详情
         $api->get('contact/{id}/view', 'ContactController@getContactView');
         //46 添加
         $api->post('contact', 'ContactController@postContact');
         //47 编辑
         $api->post('contact/{id}/edit', 'ContactController@postContactEdit');
         //48 删除
         $api->post('contact/{id}/del', 'ContactController@postContactDel');
         //49 邀请
         $api->post('contact/{id}/invite', 'ContactController@postContactInvite');

         //我的
         //数据统计
          $api->get('me/count', 'MeController@getCount');
         //info
          $api->get('me/info', 'MeController@getUserInfo');
         //50 收藏夹
         $api->get('me/fav', 'MeController@getFavList');
         //51 收藏／取消收藏
          $api->post('me/fav/{id}/add', 'MeController@postFavAdd');
          $api->post('me/fav/{id}/del', 'MeController@postFavDel');
         //52 关注店铺
         $api->get('me/shop', 'MeController@getShopList');
         //53 关注／取消关注
         $api->post('me/shop/{id}/follow', 'MeController@postShopFollow');
         $api->post('me/shop/{id}/unfollow', 'MeController@postShopUnFollow');
         //54 足迹
         $api->get('me/footprint', 'MeController@getFootprintList');

         //55 账号列表
         $api->get('me/acclog/shop', 'MeController@getAcclogShop');
         //56 打款
         $api->post('me/acclog', 'MeController@postAcclog');
         //账单
         //66 账单列表
         $api->get('me/acclog/list', 'MeController@getAcclogList');

         //todo
         //59 成员
         $api->get('company/user', 'CompanyController@getCompanyUser');
         //60 添加
         $api->post('company/user', 'CompanyController@postCompanyUser');
         //60 邀请
         $api->post('company/user/invite', 'CompanyController@postCompanyUserInvite');
         //60 取消邀请
         $api->post('company/user/{id}/del', 'CompanyController@postCompanyUserDel');
         //61 成员通过／拒绝
         $api->post('company/user/{id}/apply', 'CompanyController@postCompanyApply');
         $api->post('company/user/{id}/unapply', 'CompanyController@postCompanyUnApply');

         //产品
         $api->get('company/sku', 'CompanyController@getCompanySku');
         //详情
         $api->get('company/sku/{id}/view', 'CompanyController@getCompanySkuView');
         //62 产品添加
         $api->post('company/sku', 'CompanyController@postCompanySku');
         //63 产品编辑
         $api->post('company/sku/{id}/edit', 'CompanyController@postCompanySkuEdit');
         //64 产品上／下架
         $api->post('company/sku/{id}/shelf', 'CompanyController@postCompanySkuShelf');
         $api->post('company/sku/{id}/unshelf', 'CompanyController@postCompanySkuUnShelf');
         //65 产品删除
         $api->post('company/sku/{id}/del', 'CompanyController@postCompanySkuDel');
         //66 获取产品标签

         //经办人todo
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
