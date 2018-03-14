<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;



class Stock extends Model
{
    

            use Translatable,
        HasRelationships;

	public function cartId()
    {
        return $this->hasMany(Cart::class);
    }
}