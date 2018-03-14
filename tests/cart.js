/**
 * @api {get} /carts 购物车列表
 * @apiVersion 0.1.0
 * @apiName GetCart
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/carts
 * @apiParam {String} status 阶段状态[需求阶段|备货阶段]
 * @apiUse CartsSuccess
 */
function getCart() { return; }

/**
 * @api {post} /carts 添加购物车
 * @apiVersion 0.1.0
 * @apiName PostCart
 * @apiGroup Cart
 * @apiParam {Number} sku_id 商品ID.
 * @apiExample Example usage:
 * curl -i http://localhost/carts
 */
function postCart { return; }

/**
 * @api {post} /carts/:id 更新购物车
 * @apiVersion 0.1.0
 * @apiName PostCartUpdate
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/carts/:id
 * @apiParam {String} price 价格.
 * @apiParam {String} num 数量.
 *
 */
function postCartUpdate() { return; }

/**
 * @api {delete} /carts/:id 删除购物车
 * @apiVersion 0.1.0
 * @apiName DeleteCart
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost//carts/:id 
 */
function DeleteCart { return; }

/**
 * @api {get} /carts/delete_history 最近删除记录
 * @apiVersion 0.1.0
 * @apiName CartDeleteHistory
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/carts/delete_history
 * @apiUse GoodsSuccess
 */
function cartDeleteHistory { return; }

/**
 * @api {post} /carts/stock 备货
 * @apiVersion 0.1.0
 * @apiName PostCartsStock
 * @apiGroup Cart
 * @apiExample Example usage:
 * curl -i http://localhost/carts/stock
 * @apiParam {Number} cart_id 购物车ID.
 * @apiParam {String} unit 每匹单位.
 * @apiParam {String} num 匹数.
 */
function postCartStock { return; }
