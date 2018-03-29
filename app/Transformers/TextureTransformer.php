<?php

namespace App\Transformers;

use App\Texture;
use League\Fractal\TransformerAbstract;

class TextureTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['skus'];

    public function transform(Texture $texture)
    {
        return [
            'id' => $texture->id,
            'tid'=> $texture->tid,
            'created'=>$texture->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function includeSkus(Texture $texture)
    {
        $skus = $texture->skus()->get();

        return $this->collection($skus, new TextureSkuTransformer());
    }
}