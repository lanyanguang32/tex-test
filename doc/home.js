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
 * @apiSuccess {Number} tag_id 标签id.
 * @apiSuccess {String} tag_name 标签名称.
 * @apiSuccess {Array} skus 标签下商品数组.
 * @apiSuccess {Number} skus.data.id 商品id.
 * @apiSuccess {String} skus.data.image 商品图片.
 * @apiSuccess {String} skus.data.title 商品标题.
 * @apiSuccess {String} skus.data.material 材质.
 * @apiSuccess {String} skus.data.weight 平方克重.
 * @apiSuccess {String} skus.data.is_fav 是否收藏 0 否 1 是.
 *
 */
function getRecommend() { return; }