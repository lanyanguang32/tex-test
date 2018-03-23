/**
 * @api {get} /3d/categories 3D服装行业
 * @apiVersion 0.1.0
 * @apiName get3DCategory
 * @apiGroup 3D
 * @apiExample Example usage:
 * curl -i http://localhost/3d/categories
 *
 * @apiSuccess {String} id 分类ID.
 * @apiSuccess {String} name 分类名称.
 * @apiSuccess {String[]} mods 模特.
 * @apiSuccess {String} mods.id 模特ID.
 * @apiSuccess {String} mods.image 模特图片.
 */
function get3DCategory() { return; }

/**
 * @api {get} /3d/models 3D模特图片
 * @apiVersion 0.1.0
 * @apiName get3DModel
 * @apiGroup 3D
 * @apiExample Example usage:
 * curl -i http://localhost/3d/models
 * @apiSuccess {String} id 模特ID.
 * @apiSuccess {String} image 模特图片.
 */
function get3DModel() { return; }

/**
 * @api {post} /3d/warp 3D面料试衣
 * @apiVersion 0.1.0
 * @apiName post3DWarp
 * @apiGroup 3D
 * @apiExample Example usage:
 * curl -i http://localhost/3d/warp
 * @apiParam {Number} mod_id 模特ID.
 * @apiParam {Number} goods_id 面料ID.
 * @apiParam {Number} move_x 布料在模特x轴的偏移，默认为0，可不传.
 * @apiParam {Number} move_y 布料在模特y轴的偏移，默认为0，可不传.
 * @apiParam {Number} zoom 布料放大百分比，默认为100，可不传.
 * @apiSuccess {String} image 试衣效果图.
 */
function post3DWarp() { return; }
