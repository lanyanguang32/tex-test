/**
 * @api {get} /me/info 用户信息
 * @apiVersion 0.1.0
 * @apiName getUserInfo
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/info
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} phone 手机号码.
 * @apiSuccess {String} name 昵称. 
 * @apiSuccess {String} avatar 头像. 
 * @apiSuccess {Boolean} admin 1是 0否. 
 * @apiPermission admin
 */
function getUserInfo() { return; }

/**
 * @api {get} /me/fav 收藏夹
 * @apiVersion 0.1.0
 * @apiName getFavList
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/fav
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} image 图片.
 * @apiSuccess {String} title 名称. 
 * @apiSuccess {String} material 材质. 
 * @apiSuccess {String} weight 平方克重. 
 * @apiPermission admin
 */
function getFavList() { return; }


/**
 * @api {post} /me/fav/{id}/add 添加收藏夹
 * @apiVersion 0.1.0
 * @apiName postFavAdd
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/fav/{id}/add
 * @apiPermission admin
 */
function postFavAdd() { return; }

/**
 * @api {post} /me/fav/{id}/del 删除收藏夹
 * @apiVersion 0.1.0
 * @apiName postFavDel
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/fav/{id}/del
 * @apiPermission admin
 */
function postFavDel() { return; }


/**
 * @api {get} /me/shop 关注店铺列表
 * @apiVersion 0.1.0
 * @apiName getShopList
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/shop
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} image 图片.
 * @apiSuccess {String} title 名称. 
 * @apiPermission admin
 */
function getShopList() { return; }


/**
 * @api {post} /me/shop/{id}/follow 关注店铺
 * @apiVersion 0.1.0
 * @apiName postShopFollow
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/fav/{id}/follow
 * @apiPermission admin
 */
function postShopFollow() { return; }

/**
 * @api {post} /me/shop/{id}/unfollow 取消关注店铺
 * @apiVersion 0.1.0
 * @apiName postShopUnFollow
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/fav/{id}/unfollow
 * @apiPermission admin
 */
function postShopUnFollow() { return; }


/**
 * @api {get} /me/footprint 足迹
 * @apiVersion 0.1.0
 * @apiName getFootprintList
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/footprint
 * @apiParam {Number} type 0 商品 1店铺 默认可以为空
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} image 图片.
 * @apiSuccess {String} title 名称. 
 * @apiSuccess {String} material 材质. 
 * @apiSuccess {String} weight 平方克重. 
 * @apiUse ShopSuccess
 * @apiPermission admin
 */
function getFootprintList() { return; }

/**
 * @api {get} /me/acclog/shop 账号列表
 * @apiVersion 0.1.0
 * @apiName getAcclogShop
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/acclog/shop
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} name 名称.
 * @apiSuccess {Number} balance 余额. 
 * @apiPermission admin
 */
function getAcclogShop() { return; }

/**
 * @api {get} /me/acclog/list 账单列表
 * @apiVersion 0.1.0
 * @apiName getAcclogList
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/acclog/list
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} memo 备注.
 * @apiSuccess {Number} current 交易金额. 
 * @apiSuccess {Number} status 类型 0收入 1支出. 
 * @apiSuccess {String} shop 收款方. 
 * @apiSuccess {String} created 交易时间. 
 * @apiPermission admin
 */
function getAcclogList() { return; }

/**
 * @api {post} /me/acclog 打款
 * @apiVersion 0.1.0
 * @apiName postAcclog
 * @apiGroup Me
 * @apiExample Example usage:
 * curl -i http://localhost/me/acclog
 * @apiParam {Number} shop_id 店铺ID
 * @apiParam {Number} current 金额
 * @apiParam {String} bankname 账号
 * @apiParam {String} image 打款凭证图片
 * @apiPermission admin
 */
function postAcclog() { return; }

