<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;



class Shop extends Model
{
            use Translatable,
        HasRelationships;

	public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

    public function skus()
    {
        return $this->hasMany(Sku::class,'user_id','user_id');
    }
}
