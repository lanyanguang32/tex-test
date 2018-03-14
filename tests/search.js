/**
 * @api {get} /search/keyword 关键字搜索
 * @apiVersion 0.1.0
 * @apiName getSearchByKeyWord
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/passport/search_by_keyword
 *
 * @apiParam {String} key_word 关键字.
 * @apiUse GoodsSuccess
 */
function getSearchByKeyword() { return; }

/**
 * @api {post} /search/image 以图搜索
 * @apiVersion 0.1.0
 * @apiName PostSearchByImage
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/search/image
 *
 * @apiParam {String} image 客户端图片.
 * @apiUse GoodsSuccess
 */
function postSearchByImage() { return; }

/**
 * @api {get} /search/history 搜索历史
 * @apiVersion 0.1.0
 * @apiName GetSearchHistory
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/search/history
 *
 * @apiSuccess {String} keyword 关键字.
 */
function getSearchHistory() { return; }

/**
 * @api {delete} /search/history 删除搜索历史
 * @apiVersion 0.1.0
 * @apiName DeleteSearchHistory
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/search/history
 *
 */
function deleteSearchHistory() { return; }