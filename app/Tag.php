<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{

	protected $table = 'tags';

 	public function catId()
    {
        return $this->belongsTo(Tagcat::class);
    }


    public function skus()
    {
        return $this->belongsToMany(Skus::class,'sku_tag','tag_id','sku_id');
    }

}
