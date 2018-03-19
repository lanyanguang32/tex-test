
// ------------------------------------------------------------------------------------------
// General apiDoc documentation blocks and old history blocks.
// ------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------
// Current Success.
// ------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------
// Passport Errors.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine ErrorsExample
 * @apiVersion 0.1.0
 *
 * @apiError message 获取图形验证码失败.
 *
 * @apiErrorExample  Response (example):
 *     HTTP/1.1 422 Bad Request
 *     {
 *       "message": "获取图形验证码失败"
 *       "errors": {
 *           "phone": [
 *               "validation.required"
 *           ]
 *       },
 *       "status_code": 422,
 *     }
 */

// ------------------------------------------------------------------------------------------
// Current Permissions.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine admin Admin access rights needed.
 * Optionally you can write here further Informations about the permission.
 *
 * An "apiDefinePermission"-block can have an "apiVersion", so you can attach the block to a specific version.
 *
 * @apiVersion 0.1.0
 */


 // ------------------------------------------------------------------------------------------
// Trades Paragm.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine TradesParagm
 * @apiVersion 0.1.0
 * @apiParam {String[]} cart_id 购物车ID.
 * @apiParam {String} receiver_id 配送地址ID.
 * @apiParam {String} payment_id 支付方式ID.
 * @apiParam {String} payment_image 支付凭证.
 * @apiParam {String} payment_user 汇款人.
 * @apiParam {String} payment_fee 汇款金额.
 */

 // ------------------------------------------------------------------------------------------
// UserSuccess.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine UserSuccess
 * @apiSuccess {String} id 用户ID.
 * @apiSuccess {String} name 昵称.
 * @apiSuccess {String} email 邮箱.
 * @apiSuccess {String} avatar 头像.
 * @apiSuccess {String} bound_phone 绑定手机.
 * @apiSuccess {String} bound_wechat 绑定微信.
 * @apiSuccess {String} created_at 创建时间.
 * @apiSuccess {String} updated_at 更新时间.
 */

 // ------------------------------------------------------------------------------------------
// Trades Success.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine TradesSuccess
 * @apiSuccess {String} tid 订单号.
 * @apiSuccess {String} stockno 码单.
 * @apiSuccess {String} shipno 托运单.
 * @apiSuccess {String[]} skus 订单商品.
 * @apiSuccess {String} skus.sku 商品标题.
 * @apiSuccess {String} skus.image 商品图片.
 * @apiSuccess {String} skus.material 材质.
 * @apiSuccess {String} skus.weight 平方克重.
 * @apiSuccess {String} skus.price 价格.
 * @apiSuccess {String} skus.num 数量.
 */


// ------------------------------------------------------------------------------------------
// PaymentDetailSuccess.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine PaymentDetailSuccess
 * @apiSuccess {String} id 支付方式ID.
 * @apiSuccess {String} name 支付方式名称.
 * @apiSuccess {String} user 开户名.
 * @apiSuccess {String} bank 开户行.
 * @apiSuccess {String} card 帐号.
 */


// ------------------------------------------------------------------------------------------
// Goods Paragm.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine GoodsParagm
 * @apiVersion 0.1.0
 * @apiParam {Number} pagesize 每页显示条数(queryString参数)。
 * @apiParam {Number} page 页码（queryString参数）。
 * @apiParam {String} tags 筛选条件，多个条件用逗号(,)分隔。
 * @apiParam {String} keyword 搜索条件，图片搜索时为图片文件。
 * @apiParam {String} type 搜索类型，选项为(prod产品)(shop商家)，默认为产品。
 */

 // ------------------------------------------------------------------------------------------
// Carts Success.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine CartsSuccess
 * @apiSuccess {String} title 商家名称.
 * @apiSuccess {String} id 商品ID.
 * @apiSuccess {String} sku 商品标题.
 * @apiSuccess {String} image 商品图片.
 * @apiSuccess {String} material 材质.
 * @apiSuccess {String} weight 平方克重.
 * @apiSuccess {String} shrinkage 缩水率.
 * @apiSuccess {String} price 价格.
 * @apiSuccess {String} num 数量.
 * @apiSuccess {String[]} stock 备货.
 * @apiSuccess {String} stock.id 备货ID.
 * @apiSuccess {String} stock.unit 每匹单位.
 * @apiSuccess {String} stock.num 匹数.
 */

 // ------------------------------------------------------------------------------------------
// Goods Success.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine GoodsSuccess
 * @apiSuccess {String} id 商品ID.
 * @apiSuccess {String} sku 商品标题.
 * @apiSuccess {String} image 商品图片.
 * @apiSuccess {String} material 材质.
 * @apiSuccess {String} weight 平方克重.
 * @apiSuccess {String} is_fav 是否收藏(1是，0否).
 */
 // ------------------------------------------------------------------------------------------

// Shop Success.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine ShopSuccess
 * @apiSuccess {String} id 店铺ID.
 * @apiSuccess {String} name 店铺名称.
 * @apiSuccess {String} location 产地.
 * @apiSuccess {String[]} skus 店铺商品.
 * @apiSuccess {String} skus.id 商品ID.
 * @apiSuccess {String} skus.sku 商品标题.
 * @apiSuccess {String} skus.image 商品图片.
 * @apiSuccess {String} skus.material 材质.
 * @apiSuccess {String} skus.weight 平方克重.
 * @apiSuccess {String} skus.is_fav 是否收藏(1是，0否).
 */
 // ------------------------------------------------------------------------------------------
// Goods Deailt Success.
// ------------------------------------------------------------------------------------------
/**
 * @apiDefine GoodsDeailSuccess
 * @apiSuccess {String} id 商品ID.
 * @apiSuccess {String} sku 商品标题.
 * @apiSuccess {String} image 商品图片.
 * @apiSuccess {String} material 材质.
 * @apiSuccess {String} weight 门幅.
 * @apiSuccess {String} shrinkage 缩水率.
 * @apiSuccess {String} is_fav 是否收藏.
 * @apiSuccess {String[]} simlilar 一花多色.
 * @apiSuccess {String} simlilar.id 商品ID.
 * @apiSuccess {String} simlilar.sku 商品标题.
 * @apiSuccess {String} simlilar.image 商品图片.
 * @apiSuccess {String} simlilar.material 材质.
 * @apiSuccess {String} simlilar.weight 平方克重.
 * @apiSuccess {String} simlilar.is_fav 是否收藏(1是，0否).
 */