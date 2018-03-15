<?php

namespace App\Transformers;

use App\Sku;
use League\Fractal\TransformerAbstract;

class RecommendTransformer extends TransformerAbstract
{

    public function transform(Sku $sku)
    {
        return [
            'sku_id'=>$sku->id,
            'sku_image'=>\Voyager::image($sku->image),
            'sku_title'=>$sku->sku,
        ];
    }
}
