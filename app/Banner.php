<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    public function getBanners($layout = 'main')
    {
       return $this->where('show',1)->where('layout', $layout)->orderBy('order')->get();
    }
}
