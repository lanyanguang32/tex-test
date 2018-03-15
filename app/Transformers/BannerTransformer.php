<?php

namespace App\Transformers;

use App\Banner;
use League\Fractal\TransformerAbstract;

class BannerTransformer extends TransformerAbstract
{

    public function transform(Banner $banner)
    {
        return [
            'image'=>\Voyager::image($banner->image),
            'url'=>$banner->url,
            'layout'=>$banner->layout
        ];
    }
}
