<?php

namespace App\Transformers;

use App\Sku;
use League\Fractal\TransformerAbstract;

class RecommendSkuTransformer extends TransformerAbstract
{

    public function transform(Sku $sku)
    {
        return [
            'id'=>$sku->id,
            'image'=>\Voyager::image($sku->image),
            'title'=>$sku->sku,
            'material'=>$sku->material,
            'weight'=>$sku->weight,
            'is_fav'=>$sku->favorited(),//?是否收藏
        ];
    }
}
