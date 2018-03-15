<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Overtrue\EasySms\EasySms;
use App\Http\Requests\Api\CaptchaRequest;
use App\Http\Requests\Api\VerificationCodeRequest;
use App\Http\Requests\Api\UserRequest;
use App\Transformers\UserTransformer;
use App\User;
use App\Http\Requests\Api\AuthorizationRequest;
use App\Http\Requests\Api\SocialAuthorizationRequest;
use App\Http\Requests\Api\PasswordByVerificationRequest;
use App\Http\Requests\Api\LoginByVerificationRequest;
use App\Http\Requests\Api\VerificationCodeByLoginAndPasswordRequest;


class PassportController extends ApiController
{

    //图形验证码
	public function postCaptcha(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
	{
        	$key = 'captcha-'.str_random(15);
	        $phone = $request->phone;
	        $captcha = $captchaBuilder->build();
	        $expiredAt = now()->addMinutes(2);
	        \Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expiredAt);
	        $result = [
	            'captcha_key' => $key,
	            'expired_at' => $expiredAt->toDateTimeString(),
	            'captcha_image_content' => $captcha->inline()
	        ];
           return $this->response->array($result)->setStatusCode(201);
	}
 
    //短信验证码
    public function postVerificationCode(VerificationCodeRequest $request, EasySms $easySms)
    {
    	$captchaData = \Cache::get($request->captcha_key);
        if (!$captchaData) {
            return $this->response->error('图片验证码已失效', 422);
        }
        if (!hash_equals($captchaData['code'], $request->captcha_code)) {
            // 验证错误就清除缓存
            \Cache::forget($request->captcha_key);
            return $this->response->errorUnauthorized('图片验证码错误');
        }
        $phone = $captchaData['phone'];
        if (!app()->environment('production')) {
            $code = '123456';
        } else {
            // 生成4位随机数，左侧补0
            $code = str_pad(random_int(1, 999999), 6, 0, STR_PAD_LEFT);
            try {
                $result = $easySms->send($phone, [
                    'content'  =>  "【色织网】您的验证码是{$code}。如非本人操作，请忽略本短信"
                ]);
            } catch (\GuzzleHttp\Exception\ClientException $exception) {
                $response = $exception->getResponse();
                $result = json_decode($response->getBody()->getContents(), true);
                return $this->response->errorInternal($result['msg'] ?? '短信发送异常');
            }
        }
        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        // 清除图片验证码缓存
        \Cache::forget($request->captcha_key);
        return $this->response->array([
            'verification_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }

    //注册
    public function postRegister(UserRequest $request)
    {
    	$verifyData = \Cache::get($request->verification_key);
        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }
        if (!hash_equals((string)$verifyData['code'], $request->verification_code)) {
            return $this->response->errorUnauthorized('验证码错误');
        }
        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password),
        ]);
        // 清除验证码缓存
        \Cache::forget($request->verification_key);
        return $this->response->item($user, new UserTransformer())
            ->setMeta([
                'access_token' => \Auth::guard('api')->fromUser($user),
                'token_type' => 'Bearer',
                'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
            ])
            ->setStatusCode(201);
    }

    //登录
    public function postLogin(AuthorizationRequest $request)
    {
    	$username = $request->username;

        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['phone'] = $username;

            $credentials['password'] = $request->password;

        if (!$token = \Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized(trans('auth.failed'));
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    //第三方登录
    public function postSocialLogin($type, SocialAuthorizationRequest $request)
    {
        if (!in_array($type, ['weixin'])) {
            return $this->response->errorBadRequest();
        }

        $driver = \Socialite::driver($type);

        try {
            if ($code = $request->code) {
                $response = $driver->getAccessTokenResponse($code);
                $token = array_get($response, 'access_token');
            } else {
                $token = $request->access_token;

                if ($type == 'weixin') {
                    $driver->setOpenId($request->openid);
                }
            }

            $oauthUser = $driver->userFromToken($token);
        } catch (\Exception $e) {
            return $this->response->errorUnauthorized('参数错误，未获取用户信息');
        }

        switch ($type) {
        case 'weixin':
            $unionid = $oauthUser->offsetExists('unionid') ? $oauthUser->offsetGet('unionid') : null;

            if ($unionid) {
                $user = User::where('weixin_unionid', $unionid)->first();
            } else {
                $user = User::where('weixin_openid', $oauthUser->getId())->first();
            }

            // 没有用户，默认创建一个用户
            if (!$user) {
                $user = User::create([
                    'name' => $oauthUser->getNickname(),
                    'avatar' => $oauthUser->getAvatar(),
                    'weixin_openid' => $oauthUser->getId(),
                    'weixin_unionid' => $unionid,
                ]);
            }

            break;
        }

        $token = \Auth::guard('api')->fromUser($user);
        return $this->respondWithToken($token)->setStatusCode(201);
    }

    //登录和修改密码验证码
    public function postVerificationCodeByLoginAndPassword(VerificationCodeByLoginAndPasswordRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;
        if (!app()->environment('production')) {
            $code = '123456';
        } else {
            // 生成6位随机数，左侧补0
            $code = str_pad(random_int(1, 999999), 6, 0, STR_PAD_LEFT);
            try {
                $result = $easySms->send($phone, [
                    'content'  =>  "【色织网】您的验证码是{$code}。如非本人操作，请忽略本短信"
                ]);
            } catch (\GuzzleHttp\Exception\ClientException $exception) {
                $response = $exception->getResponse();
                $result = json_decode($response->getBody()->getContents(), true);
                return $this->response->errorInternal($result['msg'] ?? '短信发送异常');
            }
        }
        $key = 'verificationCodeByLogin_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        return $this->response->array([
            'verification_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }

    //短信登录
    public function postLoginByVerification(LoginByVerificationRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }
        if (!hash_equals((string)$verifyData['code'], $request->verification_code)) {
            return $this->response->errorUnauthorized('验证码错误');
        }
        
        $user = User::where('phone', $verifyData['phone'])->first();

        if(!$user){
            return $this->response->errorUnauthorized('验证码无效');
        }

        $token = \Auth::guard('api')->fromUser($user);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);
        
        return $this->respondWithToken($token)->setStatusCode(201);
    }


    //短信找回密码
    public function postPasswordByVerification(PasswordByVerificationRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }
        if (!hash_equals((string)$verifyData['code'], $request->verification_code)) {
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::where('phone', $verifyData['phone'])->first();

        if(!$user){
            return $this->response->errorUnauthorized('验证码无效');
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);
        return $this->response->noContent();
    }

    //刷新token
    public function postRefreshToken()
    {
        $token = \Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }


    //退出登录删除token
    public function postLogout()
    {
        \Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    //其它
    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
