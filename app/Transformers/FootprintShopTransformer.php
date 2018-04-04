<?php

namespace App\Transformers;

use App\Footprint;
use League\Fractal\TransformerAbstract;

class FootprintShopTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['skus'];

    public function transform(Footprint $footprint)
    {
        return [
            'id'=>$footprint->shop->user_id,
            'name'=>$footprint->shop->name,
            'location'=>$footprint->shop->location,
        ];
    }

    public function includeSkus(Footprint $footprint)
    {
        $skus = $footprint->shop->skus()->take(3)->get();

        return $this->collection($skus, new RecommendSkuTransformer());
    }
}
