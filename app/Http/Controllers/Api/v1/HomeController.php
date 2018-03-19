<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Banner;
use App\Tag;
use App\Tagcat;
use App\Transformers\BannerTransformer;
use App\Transformers\RecommendTransformer;

class HomeController extends ApiController
{
    //首页banner
    public function getBanner(Request $request, Banner $banner)
    {
       $banners = $banner->getBanners();

       return $this->response->collection($banners, new BannerTransformer());
    }

    //首页推荐
    public function getRecommend(Request $request)
    {
       $tagCat = Tagcat::where('name', '推荐')->first();
        
       $recommends = $tagCat->tags()->get();

       return $this->response->collection($recommends, new RecommendTransformer());
    }
}
