/**
 * @api {get} /payments 获取支付方式
 * @apiVersion 0.1.0
 * @apiName GetPayment
 * @apiGroup Trade
 * @apiExample Example usage:
 * curl -i http://localhost/payments
 * @apiSuccess {String} id 支付方式ID.
 * @apiSuccess {String} name 支付方式名称.
 */
function getPayment() { return; }

/**
 * @api {get} /payments/:id 获取支付方式详情
 * @apiVersion 0.1.0
 * @apiName GetPaymentDetail
 * @apiGroup Trade
 * @apiExample Example usage:
 * curl -i http://localhost/payments/:id
 * @apiUse PaymentDetailSuccess
 */
function getPaymentDetail() { return; }

/**
 * @api {post} /trades 创建订单
 * @apiVersion 0.1.0
 * @apiName PostTrade
 * @apiGroup Trade
 * @apiExample Example usage:
 * curl -i http://localhost/trades
 * @apiUse TradesParagm
 */
function postTrade() { return; }

/**
 * @api {get} /trades 订单列表
 * @apiVersion 0.1.0
 * @apiName GetTrade
 * @apiGroup Trade
 * @apiExample Example usage:
 * curl -i http://localhost/trades
 * @apiParam {String} status 阶段状态[物流阶段|完成阶段]
 * @apiUse TradesSuccess
 */
function getTrade() { return; }

/**
 * @api {post} /trades/shipping 配送发货
 * @apiVersion 0.1.0
 * @apiName PostShipping
 * @apiGroup Trade
 * @apiExample Example usage:
 * curl -i http://localhost/trades/shipping
 * @apiParam {String} shipimage 发货图片
 */
function postShipping() { return; }


/**
 * @api {post} /trades/confirm 确认收货
 * @apiVersion 0.1.0
 * @apiName PostConfirm
 * @apiGroup Trade
 * @apiExample Example usage:
 * curl -i http://localhost/trades/confirm
 * @apiParam {String} receiverimage 确认收货图片
 */
function postConfirm() { return; }