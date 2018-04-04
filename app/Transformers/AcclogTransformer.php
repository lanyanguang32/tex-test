<?php

namespace App\Transformers;

use App\Acclog;
use League\Fractal\TransformerAbstract;

class AcclogTransformer extends TransformerAbstract
{
    public function transform(Acclog $acclog)
    {
        return [
        	'id' => $acclog->id,
            'memo' => $acclog->memo,
            'current' => $acclog->current,
            'status' => $acclog->status,
            'shop' => $acclog->shop->name, //对方账号
            'created' => $acclog->created_at->format('Y-m-d H:i:s'), //发生时间
        ];
    }
}
