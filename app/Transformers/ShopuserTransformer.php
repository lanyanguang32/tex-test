<?php

namespace App\Transformers;

use App\Shopuser;
use League\Fractal\TransformerAbstract;

class ShopuserTransformer extends TransformerAbstract
{
    public function transform(Shopuser $shopuser)
    {
        return [
            'id' => $shopuser->id,
            'name' => $shopuser->user->name,
            'phone' => $shopuser->user->phone,
            'status' => $shopuser->status,
        ];
    }
}
