<?php

namespace App\Transformers;

use App\Mod;
use League\Fractal\TransformerAbstract;

class ModTransformer extends TransformerAbstract
{
    public function transform(Mod $mod)
    {
        return [
            'id' => $mod->id,
            'image' => $mod->image
        ];
    }
}
