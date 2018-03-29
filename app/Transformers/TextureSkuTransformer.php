<?php

namespace App\Transformers;

use App\Texturesku;
use League\Fractal\TransformerAbstract;

class TextureSkuTransformer extends TransformerAbstract
{
    public function transform(Texturesku $sku)
    {
        return [
            'id' => $sku->id,
            'image'=>\Voyager::image($sku->image),
            'title'=>$sku->title,
            'material'=>$sku->material,
            'weight'=>$sku->weight,
        ];
    }
}
