<?php

namespace App\Transformers;

use App\Shop;
use App\Sku;
use League\Fractal\TransformerAbstract;

class ShopResultTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['skus'];

    public function transform(Shop $shop)
    {
        return [
            'id'=>$shop->user_id,
            'name'=>$shop->name,
            'location'=>$shop->location,
        ];
    }

    public function includeSkus(Shop $shop)
    {
        $skus = $shop->skus()->take(3)->get();

        return $this->collection($skus, new RecommendSkuTransformer());
    }
}
