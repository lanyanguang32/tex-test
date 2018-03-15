/**
 * @api {get} /category/tags 分类列表
 * @apiVersion 0.1.0
 * @apiName getTag
 * @apiGroup Category
 * @apiExample Example usage:
 * curl -i http://localhost/category/tags
 *
 * @apiSuccess {Number} id 分类ID.
 * @apiSuccess {String} name 分类名称.
 * @apiSuccess {Number} parent_id 分类父ID,默认0.
 * @apiSuccess {Array} tags 末级分类拥有关联标签tags.
 * @apiSuccess {Array} tags.id 标签ID.
 * @apiSuccess {Array} tags.name 标签名称.
 *
 */
function getTag() { return; }