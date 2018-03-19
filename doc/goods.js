/**
 * @api {post} /goods/find 商品筛选
 * @apiVersion 0.1.0
 * @apiName postGoodsFind
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/find
 *
 * @apiSuccess {Number} id 分类ID.
 * @apiSuccess {String} name 分类名称.
 * @apiUse GoodsParagm
 * @apiUse GoodsSuccess
 * @apiUse ShopSuccess
 *
 */
function postGoodsFind() { return; }

/**
 * @api {get} /goods/detail/:id 商品详情
 * @apiVersion 0.1.0
 * @apiName GetGoodsDetail
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/detail/:id 
 * @apiUse GoodsDeailSuccess
 */
function getGoodsDetail() { return; }