<?php

namespace App\Transformers;

use App\Fav;
use League\Fractal\TransformerAbstract;

class FavTransformer extends TransformerAbstract
{
    public function transform(Fav $fav)
    {
        return [
            'id' => $fav->sku->id,
            'image'=>\Voyager::image($fav->sku->image),
            'title'=>$fav->sku->sku,
            'material'=>$fav->sku->material,
            'weight'=>$fav->sku->weight,
        ];
    }
}
