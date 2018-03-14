/**
 * @api {get} /goods 所有产品
 * @apiVersion 0.1.0
 * @apiName GetGoods
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods
 * @apiUse GoodsParagm
 * @apiUse GoodsSuccess
 */
function getGoods() { return; }

/**
 * @api {get} /goods/new 刚刚上架
 * @apiVersion 0.1.0
 * @apiName GetGoodsNew
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/new
 * @apiUse GoodsParagm
 * @apiUse GoodsSuccess
 */
function getGoodsNew() { return; }

/**
 * @api {get} /goods/hot 热销产品
 * @apiVersion 0.1.0
 * @apiName GetGoodsHot
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/hot
 * @apiUse GoodsParagm
 * @apiUse GoodsSuccess */
function getGoodsHot() { return; }

/**
 * @api {get} /goods/recommend 天天特价
 * @apiVersion 0.1.0
 * @apiName GetGoodsRecommend
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/recommend
 * @apiUse GoodsParagm
 * @apiUse GoodsSuccess
 */
function getGoodsRecommend() { return; }

/**
 * @api {get} /goods/history 历史足迹
 * @apiVersion 0.1.0
 * @apiName GetGoodsHistory
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/history
 * @apiUse GoodsSuccess
 */
function getGoodsHistory() { return; }

/**
 * @api {get} /goods/filter 筛选条件
 * @apiVersion 0.1.0
 * @apiName GetGoodsFilter
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/filter
 * @apiSuccess {String} name 筛选名称.
 * @apiSuccess {String} id 筛选项值.
 */
function getGoodsFilter() { return; }

/**
 * @api {get} /goods/detail/:id 产品详情
 * @apiVersion 0.1.0
 * @apiName GetGoodsDetail
 * @apiGroup Goods
 * @apiExample Example usage:
 * curl -i http://localhost/goods/detail/:id 
 * @apiUse GoodsDeailSuccess
 */
function getGoodsDetail() { return; }
