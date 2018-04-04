<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;

class Follow extends Model
{
    
        use Translatable,
        HasRelationships;

     protected $fillable = ['user_id','shop_id'];

	public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

    public function shopId()
    {
        return $this->hasMany(Shop::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}
