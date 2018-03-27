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

         protected $fillable = ['user_id','sku_id','shop_id'];

	public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

    public function skuId()
    {
        return $this->hasMany(Sku::class);
    }

    public function sku()
    {
        return $this->belongsTo(Sku::class);
    }
}
