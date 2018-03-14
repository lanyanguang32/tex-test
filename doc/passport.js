/**
 * @api {post} /passport/captcha 图形验证码
 * @apiVersion 0.1.0
 * @apiName postCaptcha
 * @apiGroup Passport
 * @apiExample Example usage:
 * curl -i http://localhost/passport/captcha
 *
 * @apiParam {String} phone 手机号码.
 * @apiSuccess {String} captcha_key 图形验证码key.
 * @apiSuccess {String} expired_at 图形验证码有效期.
 * @apiSuccess {String} captcha_image_content 图形验证码内容.
 * @apiUse ErrorsExample
 */
function postCaptcha() { return; }

/**
 * @api {post} /passport/verificationCode 短信验证码
 * @apiVersion 0.1.0
 * @apiName postVerificationCode
 * @apiGroup Passport
 * @apiExample Example usage:
 * curl -i http://localhost/passport/verificationCode
 * @apiParam {String} captcha_key 图形验证码key.
 * @apiParam {String} captcha_code 图形验证码（用户输入）.
 * @apiSuccess {String} verification_key 短信验证码key.
 * @apiSuccess {String} expired_at 短信验证码有效期.
 * @apiUse ErrorsExample
 */

function postVerificationCode() { return; }

/**
 * @api {post} /passport/register 帐号注册
 * @apiVersion 0.1.0
 * @apiName postRegister
 * @apiGroup Passport
 * @apiExample Example usage:
 * curl -i http://localhost/passport/register
 *
 * @apiParam {String} verification_key 短信验证码key.
 * @apiParam {String} verification_code 短信验证码(用户输入).
 * @apiParam {String} name 昵称.
 * @apiParam {String} password 密码.
 * @apiUse UserSuccess
 * @apiSuccess {String} access_token 返回在meta部分.
 * @apiSuccess {String} token_type 返回在meta部分.
 * @apiSuccess {String} expires_in 返回在meta部分.
 *
 */
function postRegister() { return; }

/**
 * @api {post} /passport/login 帐号登录
 * @apiVersion 0.1.0
 * @apiName PostLogin
 * @apiGroup Passport
 * @apiExample Example usage:
 * curl -i http://localhost/passport/login
 *
 * @apiParam {String} username 用户名，手机号码或者邮箱.
 * @apiParam {String} password 密码.
 * @apiSuccess {String} access_token token值.
 * @apiSuccess {String} token_type token类型.
 * @apiSuccess {String} expires_in token有效期.
 */
function postLogin() { return; }

