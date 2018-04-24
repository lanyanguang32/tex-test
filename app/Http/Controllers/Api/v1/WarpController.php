<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Modcat;
use App\Mod;
use App\Sku;
use App\Transformers\ModcatTransformer;
use App\Transformers\ModTransformer;
use App\Transformers\WarpTransformer;


class WarpController extends ApiController
{
    //3D服装行业
    public function getCategories()
    {
      $categories = Modcat::orderBy('order')->get();

      return $this->response->collection($categories, new ModcatTransformer());
    }

    //3D模特图片
    public function getModels()
    {

      $mods = Mod::orderBy('order')->get();

      return $this->response->collection($mods, new ModTransformer());
    }

    //3D面料试衣
    public function postWarp(Request $request)
    {
      //调用张工接口todo
    	//mod_id
    	//goods_id
      //move_x=0
      //move_y=0
      //zoom=100
      $mod = Mod::find($request->mod_id);
      $goods = Sku::find($request->goods_id);

      $model = $mod->name;
      $clothPath = 'upload/' . $goods->sku.'.jpg';
      $move_x = $request->input('move_x', 0); 
      $move_y = $request->input('move_y', 0); 
      $zoom = $request->input('zoom', 100); 

      $url = "http://47.104.186.103/fitting/api/ef.jsp";
      $param =  [
        'model'=>$model,
        'clothPath'=>$clothPath,
        'move_x'=>$move_x,
        'move_y'=>$move_y,
        'zoom'=>$zoom
      ];


      $return = file_get_contents($url . '?' .http_build_query($param));
      
      $return = json_decode($return);


      if($return->type == 'true'){
        return $this->response->array([
                    'image'=> $return->imgName,
              ]);
      }else{
        return $this->response->array([
            'image'=> 'http://47.104.186.103/img//fitting/out/default/ef.jpg'
         ]);
      }
    }
}
