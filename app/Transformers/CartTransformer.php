<?php

namespace App\Transformers;

use App\Cart;
use League\Fractal\TransformerAbstract;

class CartTransformer extends TransformerAbstract
{

	protected $defaultIncludes = ['sku'];

    public function transform(Cart $cart)
    {
        return [
            'id' => $cart->id,
            'price' => $cart->price,
            'num' => $cart->num,
        ];
    }

    public function includeSku(Cart $cart)
    {
        return $this->item($cart->sku, new CartSkuTransformer());
    }
}
