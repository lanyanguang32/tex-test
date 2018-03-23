<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;



class Search extends Model
{
     use Translatable,
        HasRelationships;

    protected $table = 'searches';


    protected $fillable = [
        'user_id', 'tag', 'tag_id'
    ];


    public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

    //skus
    public function skus()
    {
        return $this->hasMany(Sku::class,'id','tag_id');
    }


    //shops
    public function shops()
    {
        return $this->hasMany(Shop::class,'user_id','tag_id');
    }


    //viewshops
    public function viewshop()
    {
        return $this->hasMany(Shop::class,'user_id','tag_id');
    }

}
