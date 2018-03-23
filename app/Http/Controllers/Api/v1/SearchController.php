<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Search;
use App\Sku;
use App\Shop;
use League\Fractal;
use League\Fractal\Manager;
use App\Transformers\RecommendSkuTransformer;
use App\Transformers\ShopTransformer;

class SearchController extends ApiController
{
    //搜索历史列表
    public function getHistory(Request $request)
    {

      $fractal = new Manager();

      $user_id = $this->user()->id;

      $data = [
        'skus'=>[],
        'shops'=>[],
        'viewshops'=>[],
      ];

      if($request->has('type')){
        $type = $request->type;

        if($type == 1){
          $sku_ids = Search::where('user_id', $user_id)->where('tag', 1)->pluck('tag_id');

          $skus = Sku::whereIn('id', $sku_ids)->take(9)->latest('created_at')->get();

          $resource = new Fractal\Resource\Collection($skus, new RecommendSkuTransformer);

          $data['skus'] = $fractal->createData($resource)->toArray();

        }elseif($type == 2){
          $shop_ids = Search::where('user_id', $user_id)->where('tag', 2)->pluck('tag_id');

          $shops = Shop::whereIn('id', $shop_ids)->take(9)->latest('created_at')->get();

          $resource = new Fractal\Resource\Collection($shops, new ShopTransformer);

          $data['shops'] = $fractal->createData($resource)->toArray();

        }elseif($type == 3){
           $viewshop_ids = Search::where('user_id', $user_id)->where('tag', 3)->pluck('tag_id');

           $viewshops = Shop::whereIn('id', $shop_ids)->take(9)->latest('created_at')->get();

           $resource = new Fractal\Resource\Collection($viewshops, new ShopTransformer);

           $data['viewshops'] = $fractal->createData($resource)->toArray();
        } 

        return $this->response->array($data);
      }

       $sku_ids = Search::where('user_id', $user_id)->where('tag', 1)->pluck('tag_id');

       $skus = Sku::whereIn('id', $sku_ids)->take(9)->latest('created_at')->get();

       $resource = new Fractal\Resource\Collection($skus, new RecommendSkuTransformer);

       $data['skus'] = $fractal->createData($resource)->toArray();


       $shop_ids = Search::where('user_id', $user_id)->where('tag', 2)->pluck('tag_id');

       $shops = Shop::whereIn('id', $shop_ids)->take(9)->latest('created_at')->get();

       $resource = new Fractal\Resource\Collection($shops, new ShopTransformer);

       $data['shops'] = $fractal->createData($resource)->toArray();


       $viewshop_ids = Search::where('user_id', $user_id)->where('tag', 3)->pluck('tag_id');

       $viewshops = Shop::whereIn('id', $shop_ids)->take(9)->latest('created_at')->get();

       $resource = new Fractal\Resource\Collection($viewshops, new ShopTransformer);

       $data['viewshops'] = $fractal->createData($resource)->toArray();

       return $this->response->array($data);

    }

    //添加搜索历史
    public function postHistory(Request $request)
    {
        if($request->has('type')){
            $type = $request->type;
        }else{
            $type = 1;
        }

        //新增
        Search::updateOrCreate([
          'user_id'=>$this->user()->id,
          'tag'=>$type,
          'tag_id'=>$request->obj_id,
        ]);

      return $this->response->noContent();
    }

    //删除搜索历史列表
    public function postHistoryDel(Request $request)
    {
        $user_id = $this->user()->id;

        if($request->has('type')){
            $type = $request->type;
        }else{
            $type = 1;
        }

        //清空
        Search::where('user_id', $user_id)->where('tag', $type)->delete();

        return $this->response->noContent();
    }
}
