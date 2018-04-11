<?php

namespace App\Transformers;

use App\Sku;
use League\Fractal\TransformerAbstract;

class CompanySkuTransformer extends TransformerAbstract
{
    public function transform(Sku $sku)
    {

        $tag = $sku->tags()->pluck('tags.id');

        $tag =$tag->toArray();

        $tg = implode(',', $tag);

        return [
            'id' => $sku->id,
            'image'=>\Voyager::image($sku->image),
            'title'=>$sku->sku,
            'group'=>$sku->group,
            'material'=>$sku->material,
            'weight'=>$sku->weight,
            'width'=>$sku->width,
            'shrinkage'=>$sku->shrinkage,
            'tag'=>$tg,
            'status'=>$sku->status,
        ];
    }
}
