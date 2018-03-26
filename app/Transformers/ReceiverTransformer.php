<?php

namespace App\Transformers;

use App\Receiver;
use League\Fractal\TransformerAbstract;

class ReceiverTransformer extends TransformerAbstract
{
    public function transform(Receiver $receiver)
    {
        return [
            'id' => $receiver->id,
            'name' => $receiver->user,
            'phone' => $receiver->phone,
            'province' => $receiver->province,
            'city' => $receiver->city,
            'area' => $receiver->area,
            'street' => $receiver->street,
            'tag' => $receiver->address,
            'def' => ($receiver->def == 1) ? 1:0
        ];
    }
}
