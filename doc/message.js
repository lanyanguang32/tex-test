/**
 * @api {get} /message/count 消息统计
 * @apiVersion 0.1.0
 * @apiName getMessageCount
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/message/count
 * @apiSuccess {String} notices 通知.
 * @apiSuccess {String} skus 产品. 
 * @apiSuccess {String} orders 订单. 
 * @apiSuccess {String} accounts 账户. 
 * @apiPermission admin
 */
function getMessageCount() { return; }

/**
 * @api {get} /message/list 消息列表
 * @apiVersion 0.1.0
 * @apiName getMessageList
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/message/list
 * @apiParam {Number} type 消息类型 0通知 1产品 2订单 3账户
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} title 消息标题.
 * @apiSuccess {String} created 消息时间. 
 * @apiSuccess {String} message 消息主体. 
 * @apiSuccess {String} readed 已读标记 0未读 1已读. 
 * @apiPermission admin
 */
function getMessageList() { return; }


/**
 * @api {post} /message/{id}/read 标记已读
 * @apiVersion 0.1.0
 * @apiName postMessageRead
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/message/{id}/read
 * @apiPermission admin
 */
function postMessageRead() { return; }

/**
 * @api {post} /message/{id}/del 删除消息
 * @apiVersion 0.1.0
 * @apiName postMessageDel
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/message/{id}/del
 * @apiPermission admin
 */
function postMessageDel() { return; }




