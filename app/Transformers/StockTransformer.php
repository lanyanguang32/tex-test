<?php

namespace App\Transformers;

use App\Stock;
use League\Fractal\TransformerAbstract;

class StockTransformer extends TransformerAbstract
{
    public function transform(Stock $stock)
    {
        return [
           'unit'=>$stock->unit,
        ];
    }
}
