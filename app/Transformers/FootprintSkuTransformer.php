<?php

namespace App\Transformers;

use App\Footprint;
use League\Fractal\TransformerAbstract;

class FootprintSkuTransformer extends TransformerAbstract
{
    public function transform(Footprint $footprint)
    {
        return [
           'title' => $footprint->sku->sku,
           'image' => \Voyager::image($footprint->sku->image),     
           'material' => $footprint->sku->material,
           'weight' => $footprint->sku->weight,
        ];
    }
}
