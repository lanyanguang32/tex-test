/**
 * @api {get} /contact/list 通讯录
 * @apiVersion 0.1.0
 * @apiName getContactList
 * @apiGroup Contact
 * @apiExample Example usage:
 * curl -i http://localhost/contact/list
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} name 名称.
 * @apiSuccess {String} created 消息时间. 
 * @apiSuccess {String} phone 手机号码. 
 * @apiSuccess {String} company 公司名称. 
 * @apiSuccess {String} address 联系地址. 
 * @apiSuccess {String} status 状态 0未邀请 1已邀请 2 已注册. 
 * @apiPermission admin
 */
function getContactList() { return; }

/**
 * @api {get} /contact/{id}/view 通讯录详情
 * @apiVersion 0.1.0
 * @apiName getContactView
 * @apiGroup Contact
 * @apiExample Example usage:
 * curl -i http://localhost/contact/{id}/view
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} name 名称.
 * @apiSuccess {String} created 消息时间. 
 * @apiSuccess {String} phone 手机号码. 
 * @apiSuccess {String} company 公司名称. 
 * @apiSuccess {String} address 联系地址. 
 * @apiSuccess {String} status 状态 0未邀请 1已邀请 2 已注册. 
 * @apiPermission admin
 */
function getContactView() { return; }

/**
 * @api {post} /contact 添加
 * @apiVersion 0.1.0
 * @apiName postContact
 * @apiGroup Contact
 * @apiExample Example usage:
 * curl -i http://localhost/contact
 * @apiPermission admin
 * @apiParam {String} name 名称.
 * @apiParam {String} phone 手机号码. 
 * @apiParam {String} company 公司名称. 
 * @apiParam {String} address 联系地址. 
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} name 名称.
 * @apiSuccess {String} created 消息时间. 
 * @apiSuccess {String} phone 手机号码. 
 * @apiSuccess {String} company 公司名称. 
 * @apiSuccess {String} address 联系地址. 
 * @apiSuccess {String} status 状态 0未邀请 1已邀请 2 已注册. 
 */
function postContact() { return; }

/**
 * @api {post} /contact/{id}/edit 编辑
 * @apiVersion 0.1.0
 * @apiName postContactEdit
 * @apiGroup Contact
 * @apiExample Example usage:
 * curl -i http://localhost/contact/{id}/edit
 * @apiPermission admin
 * @apiParam {String} name 名称.
 * @apiParam {String} phone 手机号码. 
 * @apiParam {String} company 公司名称. 
 * @apiParam {String} address 联系地址. 
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} name 名称.
 * @apiSuccess {String} created 消息时间. 
 * @apiSuccess {String} phone 手机号码. 
 * @apiSuccess {String} company 公司名称. 
 * @apiSuccess {String} address 联系地址. 
 * @apiSuccess {String} status 状态 0未邀请 1已邀请 2 已注册. 
 */
function postContactEdit() { return; }

/**
 * @api {post} /contact/{id}/del 删除
 * @apiVersion 0.1.0
 * @apiName postContactDel
 * @apiGroup Contact
 * @apiExample Example usage:
 * curl -i http://localhost/contact/{id}/del
 * @apiPermission admin
 */
function postContactDel() { return; }

/**
 * @api {post} /contact/{id}/invite 邀请
 * @apiVersion 0.1.0
 * @apiName postContactInvite
 * @apiGroup Contact
 * @apiExample Example usage:
 * curl -i http://localhost/contact/{id}/invite
 * @apiPermission admin
 */
function postContactInvite() { return; }




