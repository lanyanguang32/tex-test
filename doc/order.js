/**
 * @api {get} /order/list 订单列表
 * @apiVersion 0.1.0
 * @apiName getOrderList
 * @apiGroup Order
 * @apiExample Example usage:
 * curl -i http://localhost/order/list
 * @apiParam {Number} shop_id 店铺ID
 * @apiParam {Number} status 订单状态 0待发货，1已发货, 2已完成
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} tid 订单编号.
 * @apiSuccess {String} payment 订单合计金额. 
 * @apiSuccess {String} paytime 下单时间. 
 * @apiSuccess {String} stockimage 备货清单图. 
 * @apiSuccess {String} shipimage 发货清单图. 
 * @apiSuccess {String[]} skus 订单商品. 
 * @apiSuccess {String} skus.title 商品标题. 
 * @apiSuccess {String} skus.price 商品价格. 
 * @apiSuccess {String} skus.num 商品数量. 
 * @apiSuccess {String} skus.image 商品图片. 
 * @apiSuccess {String} skus.material 材质. 
 * @apiSuccess {String} skus.weight 平方克重. 
 * @apiSuccess {String[]} skus.stocks 备货清单列表. 
 * @apiSuccess {String} skus.stocks.unit N匹米数. 
 * @apiPermission admin
 */
function getOrderList() { return; }


/**
 * @api {post} /order/{id}/ship 发货
 * @apiVersion 0.1.0
 * @apiName postOrderShip
 * @apiGroup Order
 * @apiExample Example usage:
 * curl -i http://localhost/order/{id}/ship
 * @apiPermission admin
 * @apiParam shipimage 发货清单图
 */
function postOrderShip() { return; }

/**
 * @api {post} /order/{id}/comfirm 收货
 * @apiVersion 0.1.0
 * @apiName postOrderConfirm
 * @apiGroup Order
 * @apiExample Example usage:
 * curl -i http://localhost/order/{id}/comfirm
 * @apiPermission admin
 * @apiParam receiverimage 收货清单图
 */
function postOrderConfirm() { return; }


