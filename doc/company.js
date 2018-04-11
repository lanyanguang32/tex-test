/**
 * @api {get} /company/user 成员列表
 * @apiVersion 0.1.0
 * @apiName getCompanyUser
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/user
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} name 名称.
 * @apiSuccess {String} phone 手机.
 * @apiSuccess {String} status 0邀请 1通过 2拒绝.
 * @apiPermission admin
 */
function getCompanyUser() { return; }


/**
 * @api {post} /company/user 添加成员
 * @apiVersion 0.1.0
 * @apiName postCompanyUser
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/user
 * @apiPermission admin
 * @apiParam {String} name 名称
 * @apiParam {String} phone 手机
 * @apiParam {String} password 密码
 */
function postCompanyUser() { return; }

/**
 * @api {post} /company/user/invite 邀请成员
 * @apiVersion 0.1.0
 * @apiName postCompanyUserInvite
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/user/invite
 * @apiPermission admin
 * @apiParam {String} phone 手机
 */
function postCompanyUserInvite() { return; }

/**
 * @api {post} /company/user/{id}/del 取消邀请
 * @apiVersion 0.1.0
 * @apiName postCompanyUserDel
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/user/{id}/del
 * @apiPermission admin
 */
function postCompanyUserDel() { return; }

/**
 * @api {post} /company/user/{id}/apply 通过邀请
 * @apiVersion 0.1.0
 * @apiName postCompanyApply
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/user/{id}/apply
 * @apiPermission admin
 */
function postCompanyApply() { return; }

/**
 * @api {post} /company/user/{id}/unapply 拒绝邀请
 * @apiVersion 0.1.0
 * @apiName postCompanyUnApply
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/user/{id}/unapply
 * @apiPermission admin
 */
function postCompanyUnApply() { return; }

/**
 * @api {get} /company/sku 产品列表
 * @apiVersion 0.1.0
 * @apiName getCompanySku
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/sku
 * @apiPermission admin
 * @apiSuccess {Number} id 记录ID.
 * @apiSuccess {String} title 商品标题.
 * @apiSuccess {String} image 商品图片.
 * @apiSuccess {String} material 材质.
 * @apiSuccess {String} weight 平方克重.
 * @apiSuccess {String} status 0 下架 1上架.
 */
function getCompanySku() { return; }

/**
 * @api {post} /company/sku 添加产品
 * @apiVersion 0.1.0
 * @apiName postCompanySku
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/sku
 * @apiPermission admin
 * @apiParam {String} title 商品标题.
 * @apiParam {String} image 商品图片.
 * @apiParam {String} material 材质.
 * @apiParam {String} weight 平方克重.
 * @apiParam {String} group 一花多色.
 * @apiParam {String} width 门幅.
 * @apiParam {String} shrinkage 缩水率.
 * @apiParam {String} tag 多个逗号分隔.
 */
function postCompanySku() { return; }

/**
 * @api {post} /company/sku/{id}/edit 编辑产品
 * @apiVersion 0.1.0
 * @apiName postCompanySkuEdit
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/sku/{id}/edit
 * @apiPermission admin
 * @apiParam {String} title 商品标题.
 * @apiParam {String} image 商品图片.
 * @apiParam {String} material 材质.
 * @apiParam {String} weight 平方克重.
 * @apiParam {String} tag 多个逗号分隔.
 * @apiParam {String} group 一花多色.
 * @apiParam {String} width 门幅.
 * @apiParam {String} shrinkage 缩水率.
 * @apiSuccess {Number} id 记录ID.
 * @apiSuccess {String} title 商品标题.
 * @apiSuccess {String} image 商品图片.
 * @apiSuccess {String} material 材质.
 * @apiSuccess {String} weight 平方克重.
 * @apiSuccess {String} group 一花多色.
 * @apiSuccess {String} width 门幅.
 * @apiSuccess {String} shrinkage 缩水率.
 * @apiSuccess {String} tag 多个逗号分隔.
 */
function postCompanySkuEdit() { return; }

/**
 * @api {post} /company/sku/{id}/shelf 产品上架
 * @apiVersion 0.1.0
 * @apiName postCompanySkuShelf
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/sku/{id}/shelf
 * @apiPermission admin
 */
function postCompanySkuShelf() { return; }

/**
 * @api {post} /company/sku/{id}/unshelf 产品下架
 * @apiVersion 0.1.0
 * @apiName postCompanySkuUnShelf
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/sku/{id}/unshelf
 * @apiPermission admin
 */
function postCompanySkuUnShelf() { return; }

/**
 * @api {post} /company/sku/{id}/del 产品删除
 * @apiVersion 0.1.0
 * @apiName postCompanySkuDel
 * @apiGroup Company
 * @apiExample Example usage:
 * curl -i http://localhost/company/sku/{id}/del
 * @apiPermission admin
 */
function postCompanySkuDel() { return; }


