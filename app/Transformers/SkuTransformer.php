<?php

namespace App\Transformers;

use App\Sku;
use League\Fractal\TransformerAbstract;

class SkuTransformer extends TransformerAbstract
{    
    protected $defaultIncludes = ['simlilar'];

    public function transform(Sku $sku)
    {
        return [
            'id'=>$sku->id,
            'image'=>\Voyager::image($sku->image),
            'title'=>$sku->sku,
            'material'=>$sku->material,
            'weight'=>$sku->weight,
            'is_fav'=>$sku->favorited(),//?是否收藏
            'shop_id'=>$sku->user_id,
        ];
    }

    public function includeSimlilar(Sku $sku)
    {   
        $group = $sku->group;
        $group_skus = Sku::where('group', $group)->where('id', '<>', $sku->id)->get();
        return $this->collection($group_skus, new RecommendSkuTransformer());
    }
}


