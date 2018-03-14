<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;



class Cartdel extends Model
{
    

            use Translatable,
        HasRelationships;

	public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

    public function skuId()
    {
        return $this->hasMany(Sku::class);
    }

}
