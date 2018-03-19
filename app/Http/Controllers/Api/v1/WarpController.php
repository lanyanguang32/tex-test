<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Modcat;
use App\Mod;
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

      return $this->response->array([
      	'image'=> 'warp image',
      ]);
    }
}
