/**
 * @api {get} /search/history 最近搜索列表
 * @apiVersion 0.1.0
 * @apiName getHistory
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/search/history
 *
 * @apiParam {String} type 全部0，默认可以不传,产品1,店铺2,店铺浏览记录3.
 * @apiUser SearchHistorySuccess
 * @apiPermission admin
 */
function getHistory() { return; }

/**
 * @api {post} /search/history 添加最近搜索
 * @apiVersion 0.1.0
 * @apiName postHistory
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/search/history
 * @apiParam {String} type 产品1，默认可以不传,店铺2.
 * @apiParam {String} obj_id 产品或店铺ID.
 * @apiPermission admin
 */
function postHistory() { return; }

/**
 * @api {post} /search/historyDel  清空最近搜索
 * @apiVersion 0.1.0
 * @apiName postHistoryDel
 * @apiGroup Search
 * @apiExample Example usage:
 * curl -i http://localhost/search/historyDel
 * @apiParam {String} type 产品1，默认可以不传,店铺2.
 * @apiPermission admin
 */
function postHistoryDel() { return; }
