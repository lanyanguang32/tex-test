<?php

namespace App\Transformers;

use App\Modcat;
use League\Fractal\TransformerAbstract;

class ModcatTransformer extends TransformerAbstract
{

	protected $defaultIncludes = ['mods'];

    public function transform(Modcat $modcat)
    {
        return [
            'id' => $modcat->id,
            'name' => $modcat->name
        ];
    }

       public function includeMods(Modcat $modcat)
    {
        $mods = $modcat->mods()->get();

        return $this->collection($mods, new ModTransformer());
    }

}
