<?php

namespace App\Transformers;

use App\Cart;
use League\Fractal\TransformerAbstract;

class CartShopTransformer extends TransformerAbstract
{
    public function transform(Cart $cart)
    {
        return [
            'id' => $cart->shop_id,
            'name' => $cart->shop->name,
            'image'=>\Voyager::image($cart->shop->image),
        ];
    }
}
