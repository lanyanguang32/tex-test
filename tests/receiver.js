/**
 * @api {get} /receivers 获取收货地址
 * @apiVersion 0.1.0
 * @apiName GetReceiver
 * @apiGroup Receiver
 * @apiExample Example usage:
 * curl -i http://localhost/receivers
 * @apiSuccess {String} id 收货地址ID.
 * @apiSuccess {String} user 收货人.
 * @apiSuccess {String} phone 手机号码.
 * @apiSuccess {String} province 省.
 * @apiSuccess {String} city 市.
 * @apiSuccess {String} area 区.
 * @apiSuccess {String} street 街道.
 * @apiSuccess {String} address 详细地址.
 * @apiSuccess {String} addrcode 邮政编码.
 * @apiSuccess {String} is_default 默认地址.
 */
function getReceiver() { return; }

/**
 * @api {post} /receivers 新增收货地址
 * @apiVersion 0.1.0
 * @apiName PostReceiver
 * @apiGroup Receiver
 * @apiExample Example usage:
 * curl -i http://localhost/receivers
 * @apiParam {String} user 收货人.
 * @apiParam {String} phone 手机号码.
 * @apiParam {String} province 省.
 * @apiParam {String} city 市.
 * @apiParam {String} area 区.
 * @apiParam {String} street 街道.
 * @apiParam {String} address 详细地址.
 * @apiParam {String} addrcode 邮政编码.
 * @apiParam {Boolean} is_default 默认地址.
 */
function postReceiver() { return; }

/**
 * @api {put} /receivers/:id 编辑收货地址/设置默认地址
 * @apiVersion 0.1.0
 * @apiName PutReceiver
 * @apiGroup Receiver
 * @apiExample Example usage:
 * curl -i http://localhost/receivers
 * @apiParam {String} user 收货人.
 * @apiParam {String} phone 手机号码.
 * @apiParam {String} province 省.
 * @apiParam {String} city 市.
 * @apiParam {String} area 区.
 * @apiParam {String} street 街道.
 * @apiParam {String} address 详细地址.
 * @apiParam {String} addrcode 邮政编码.
 * @apiParam {Boolean} is_default 默认地址.
 */
function putReceiver() { return; }

/**
 * @api {delete} /receivers/:id 删除收货地址
 * @apiVersion 0.1.0
 * @apiName DeleteReceiver
 * @apiGroup Receiver
 * @apiExample Example usage:
 * curl -i http://localhost/receivers/:id
 */
function deleteReceiver() { return; }

