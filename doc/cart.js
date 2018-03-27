/**
 * @api {get} /cart/list 购物车
 * @apiVersion 0.1.0
 * @apiName getCartList
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/list
 * @apiPermission admin
 * @apiParam {Number} shop_id 店铺ID
 * @apiParam {Number} status 购物车状态 0待备货，1待支付
 * @apiUse CartSuccess
 */
function getCartList() { return; }

/**
 * @api {get} /cart/shop 选择供应商
 * @apiVersion 0.1.0
 * @apiName getCartShop
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/shop
 * @apiSuccess {String} id 店铺ID.
 * @apiSuccess {String} name 店铺名称.
 * @apiSuccess {String} image 店铺图片. 
 * @apiPermission admin
 */
function getCartShop() { return; }

/**
 * @api {get} /cart/history 历史购物车
 * @apiVersion 0.1.0
 * @apiName getCartHistory
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/history
 * @apiParam {Number} shop_id 店铺ID，默认可为空
 * @apiUse GoodsSuccess
 * @apiPermission admin
 */
function getCartHistory() { return; }

/**
 * @api {post} /cart/sku 添加型号
 * @apiVersion 0.1.0
 * @apiName postCartSku
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/sku
 * @apiPermission admin
 * @apiParam sku_id 商品ID
 * @apiParam shop_id 店铺ID
 * @apiParam price 价格
 * @apiParam num 数量
 * @apiUse GoodsSuccess
 */
function postCartSku() { return; }

/**
 * @api {post} /cart/sku/{id}/edit 编辑
 * @apiVersion 0.1.0
 * @apiName postCartSkuEdit
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/sku/{id}/edit
 * @apiPermission admin
 * @apiParam price 价格
 * @apiParam num 数量
 * @apiUse GoodsSuccess
 */
function postCartSkuEdit() { return; }

/**
 * @api {post} /cart/sku/{id}/del 删除
 * @apiVersion 0.1.0
 * @apiName postCartSkuDel
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/sku/{id}/del
 * @apiPermission admin
 */
function postCartSkuDel() { return; }

/**
 * @api {post} /cart/stock 确认备货
 * @apiVersion 0.1.0
 * @apiName postCartStock
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/stock
 * @apiPermission admin
 */
function postCartStock() { return; }

/**
 * @api {post} /cart/payment 确认支付
 * @apiVersion 0.1.0
 * @apiName postCartPayment
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/cart/payment
 * @apiParam {Number} shop_id 店铺ID
 * @apiParam {Number} receiver_id 收货地址ID
 * @apiParam {Number} cart_ids 购物车ID，选择多个商品时，用逗号分隔
 * @apiParam {Number} payment 付款金额
 * @apiPermission admin
 */
function postCartPayment() { return; }

