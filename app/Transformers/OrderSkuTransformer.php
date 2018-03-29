<?php

namespace App\Transformers;

use App\Tradesku;
use League\Fractal\TransformerAbstract;

class OrderSkuTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['stocks'];

    public function transform(Tradesku $sku)
    {
        return [
           'title' => $sku->title,
           'price' => $sku->price,
           'num' => $sku->num,
           'image' => \Voyager::image($sku->image),     
           'material' => $sku->material,
           'weight' => $sku->weight,
        ];
    }

    public function includeStocks(Tradesku $sku)
    {
        $stocks = $sku->stocks()->get();

        return $this->collection($stocks, new StockTransformer());
    }
}
