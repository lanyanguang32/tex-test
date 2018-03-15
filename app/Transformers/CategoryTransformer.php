<?php

namespace App\Transformers;

use App\Tagcat;
use App\Tag;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
	protected $defaultIncludes = ['tags'];

    public function transform(Tagcat $tagCat)
    {
        return [
            'id' => $tagCat->id,
            'name' => $tagCat->name,
            'parent_id' => $tagCat->parent_id
        ];
    }

    public function includeTags(Tagcat $tagCat)
    {
        return $this->collection($tagCat->tags, new TagTransformer());
    }

}
