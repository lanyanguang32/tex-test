<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Sku;
use App\Tag;
use App\Shop;
use App\Transformers\SkuTransformer;
use App\Transformers\RecommendSkuTransformer;
use App\Transformers\ShopResultTransformer;

class GoodsController extends ApiController
{
    //商品筛选
    public function postGoodsFind(Request $request, Sku $query, Shop $shop)
    {
    	$pagesize = 10;
    	if($request->has('pagesize') && $pagesize>1){
    		$pagesize = $request->pagesize;
    	}
     	$type = 'prod';
     	if($request->has('type') && $request->type=='shop'){
     		//search by shop
     		$query = $shop->where('name', 'like', '%'.$request->keyword.'%');

     		$shops = $query->paginate($pagesize);

     		return $this->response->paginator($shops, new ShopResultTransformer());
     	}else{

     		//搜索
     		if($request->has('keyword') && !empty($request->keyword))
     		{
     			if($request->hasFile('keyword')){
     				//调用张工接口，返回id
     				$img_skus = ['211A'];
     				//
                    $query = $query->whereIn('sku', $img_skus);
     				//图片搜索?
     			}else{
     				$query = $query->where('sku', 'like', '%'.$request->keyword.'%');
     			}
     		}

     		//筛选
     		if($request->has('tags') && !empty($request->tags))
     		{
     			$sku_ids = \DB::table('sku_tag')->whereIn('tag_id', explode(',', $request->tags))->pluck('sku_id');
     			$query = $query->whereIn('id', $sku_ids);
     		}

     		$skus = $query->paginate($pagesize);

     		return $this->response->paginator($skus, new RecommendSkuTransformer());
     	}
    }

    //商品详情
    public function GetGoodsDetail(Request $request)
    {
     		
     	$sku = Sku::find($request->id);

     	if(!$sku){
     		return $this->response->errorNotFound();
     	}

    	return $this->response->item($sku, new SkuTransformer());
    }
}
