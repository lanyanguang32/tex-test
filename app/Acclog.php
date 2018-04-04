<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Acclog extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
