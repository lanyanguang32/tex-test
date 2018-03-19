<?php

namespace App\Transformers;

use App\Tag;
use League\Fractal\TransformerAbstract;

class RecommendTransformer extends TransformerAbstract
{
    

    protected $defaultIncludes = ['skus'];


    public function transform(Tag $tag)
    {
        return [
            'tag_id'=>$tag->id,
            'tag_name'=>$tag->name,
        ];
    }

    public function includeSkus(Tag $tag)
    {
        $skus = $tag->skus()->orderBy('id', 'desc')->take(6)->get();

        return $this->collection($skus, new RecommendSkuTransformer());
    }
}
