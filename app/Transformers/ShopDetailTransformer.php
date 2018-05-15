<?php

namespace App\Transformers;

use App\Shop;
use App\Sku;
use League\Fractal\TransformerAbstract;

class ShopDetailTransformer extends TransformerAbstract
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
        $skus = $shop->skus()->get();

        return $this->collection($skus, new RecommendSkuTransformer());
    }
}
