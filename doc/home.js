/**
 * @api {get} /home/banners 首页轮播图
 * @apiVersion 0.1.0
 * @apiName getBanner
 * @apiGroup Home
 * @apiExample Example usage:
 * curl -i http://localhost/home/banners
 *
 * @apiSuccess {String} image 轮播图.
 * @apiSuccess {String} url 链接地址.
 * @apiSuccess {String} layout 布局.
 *
 */
function getBanner() { return; }

/**
 * @api {get} /home/recommends 首页推荐
 * @apiVersion 0.1.0
 * @apiName getRecommend
 * @apiGroup Home
 * @apiExample Example usage:
 * curl -i http://localhost/home/recommends
 * @apiParam {String} tag 推荐组标签（特价、热销、新品）.
 * @apiSuccess {String} sku_id 商品id.
 * @apiSuccess {String} sku_image 商品图片.
 * @apiSuccess {String} sku_title 商品标题.
 *
 */
function getRecommend() { return; }