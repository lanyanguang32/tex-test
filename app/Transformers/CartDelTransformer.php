<?php

namespace App\Transformers;

use App\CartDel;
use League\Fractal\TransformerAbstract;

class CartDelTransformer extends TransformerAbstract
{
    public function transform(CartDel $cartDel)
    {
        return [
            'id' => $cartDel->sku_id,
            'image'=>\Voyager::image($cartDel->sku->image),
            'title'=>$cartDel->sku->sku,
            'material'=>$cartDel->sku->material,
            'weight'=>$cartDel->sku->weight,
        ];
    }
}
