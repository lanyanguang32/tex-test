<?php

namespace App\Transformers;

use App\Follow;
use League\Fractal\TransformerAbstract;

class ShopFollowTransformer extends TransformerAbstract
{
    public function transform(Follow $follow)
    {
        return [
            'id' => $follow->shop->id,
            'image'=>\Voyager::image($follow->shop->image),
            'name'=>$follow->shop->title,
        ];
    }
}
