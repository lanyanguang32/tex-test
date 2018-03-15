<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Tagcat;
use App\Transformers\CategoryTransformer;

class CategoryController extends ApiController
{
    //首页banner
    public function getTag(Request $request)
    {
      $categories = Tagcat::orderBy('order')->with('tags')->get();

      return $this->response->collection($categories, new CategoryTransformer());
    }
}
