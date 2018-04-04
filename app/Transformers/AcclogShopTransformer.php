<?php

namespace App\Transformers;

use App\Acclog;
use League\Fractal\TransformerAbstract;

class AcclogShopTransformer extends TransformerAbstract
{
    public function transform(Acclog $acclog)
    {
        return [
        	'id' => $acclog->shop_id,
            'name' => $acclog->shop->name,
            'balance' => $acclog->balance, //余额
        ];
    }
}
