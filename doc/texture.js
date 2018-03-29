/**
 * @api {get} /texture/list 小样列表
 * @apiVersion 0.1.0
 * @apiName getTextureList
 * @apiGroup Texture
 * @apiExample Example usage:
 * curl -i http://localhost/texture/list
 * @apiParam {Number} shop_id 店铺ID
 * @apiParam {Number} status 小样状态 0未提交 1已发货
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} tid 订单编号.
 * @apiSuccess {String} created 提交时间. 
 * @apiSuccess {String[]} skus 小样商品. （已发货）
 * @apiSuccess {String} skus.title 小样标题. （已发货）
 * @apiSuccess {String} skus.image 小样图片. （已发货）
 * @apiSuccess {String} skus.material 小样材质. （已发货）
 * @apiSuccess {String} skus.weight 小样平方克重. （已发货）
 * @apiSuccess {String} id 小样ID. （未提交）
 * @apiSuccess {String} title 小样标题. （未提交）
 * @apiSuccess {String} image 小样图片. （未提交）
 * @apiSuccess {String} material 小样材质. （未提交）
 * @apiSuccess {String} weight 小样平方克重. （未提交）
 * @apiPermission admin
 */
function getTextureList() { return; }


/**
 * @api {post} /texture 提交
 * @apiVersion 0.1.0
 * @apiName postTexture
 * @apiGroup Texture
 * @apiExample Example usage:
 * curl -i http://localhost/texture
 * @apiPermission admin
 * @apiParam {Number} shop_id 店铺ID
 * @apiParam {Number} receiver_id 默认收货地址
 * @apiParam {String} sku_ids 小样商品编号ID，多个逗号分隔
 * @apiSuccess {String} id 记录ID.
 * @apiSuccess {String} tid 订单编号.
 * @apiSuccess {String} created 提交时间. 
 * @apiSuccess {String[]} skus 小样商品. （已发货）
 * @apiSuccess {String} skus.title 小样标题. （已发货）
 * @apiSuccess {String} skus.image 小样图片. （已发货）
 * @apiSuccess {String} skus.material 小样材质. （已发货）
 * @apiSuccess {String} skus.weight 小样平方克重. （已发货）
 * @apiSuccess {String} id 小样ID. （未提交）
 * @apiSuccess {String} title 小样标题. （未提交）
 * @apiSuccess {String} image 小样图片. （未提交）
 * @apiSuccess {String} material 小样材质. （未提交）
 * @apiSuccess {String} weight 小样平方克重. （未提交）
 */
function postTexture() { return; }

/**
 * @api {post} /texture/sku 获取小样
 * @apiVersion 0.1.0
 * @apiName postTextureSku
 * @apiGroup Texture
 * @apiExample Example usage:
 * curl -i http://localhost/texture/sku
 * @apiPermission admin
 * @apiParam shop_id 店铺ID
 * @apiParam sku_id 小样商品ID
 * @apiSuccess {String} id 小样ID.
 * @apiSuccess {String} title 小样标题. 
 * @apiSuccess {String} image 小样图片. 
 * @apiSuccess {String} material 小样材质.
 * @apiSuccess {String} weight 小样平方克重.
 */
function postTextureSku() { return; }

/**
 * @api {post} /texture/sku/{id}/del 删除小样
 * @apiVersion 0.1.0
 * @apiName postTextureSkuDel
 * @apiGroup Texture
 * @apiExample Example usage:
 * curl -i http://localhost/texture/sku/{id}/del
 * @apiPermission admin
 */
function postTextureSkuDel() { return; }



