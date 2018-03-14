/**
 * @api {get} /messages 获取消息
 * @apiVersion 0.1.0
 * @apiName GetMessage
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/messages
 * @apiParam {Boolean} type 消息类型.
 * @apiSuccess {String} id 消息ID.
 * @apiSuccess {String} title 消息标题.
 * @apiSuccess {String} message 消息内容.
 * @apiSuccess {String} type 消息类型.
 * @apiSuccess {Date} created_at 消息时间.
 * @apiSuccess {Boolean} readed 已读标记.
 */
function getMessages() { return; }

/**
 * @api {put} /messages/:id 消息已读
 * @apiVersion 0.1.0
 * @apiName PutMessage
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/messages/:id
 */
function putMessage() { return; }

/**
 * @api {delete} /messages/:id 删除消息
 * @apiVersion 0.1.0
 * @apiName DeleteMessage
 * @apiGroup Message
 * @apiExample Example usage:
 * curl -i http://localhost/messages/:id
 */
function deleteMessage() { return; }