<?php

namespace App\Transformers;

use App\Trade;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['skus'];

    public function transform(Trade $order)
    {
        return [
            'id' => $order->id,
            'tid' => $order->tid,
            'payment' => $order->payment,
            'paytime' => $order->paytime,
            'stockimage' => \Voyager::image($order->stockimage),
            'shipimage' => \Voyager::image($order->shipimage),
        ];
    }

    public function includeSkus(Trade $order)
    {
        $skus = $order->skus()->get();

        return $this->collection($skus, new OrderSkuTransformer());
    }
}
