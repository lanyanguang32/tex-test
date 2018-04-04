<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;

class Footprint extends Model
{
    
        use Translatable,
        HasRelationships;

     protected $fillable = ['user_id','type_id', 'type'];

	public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

    public function sku()
    {
    	return $this->belongsTo(Sku::class, 'type_id', 'id');
    }

    public function shop()
    {
    	return $this->belongsTo(Shop::class, 'type_id', 'id');
    }
}
