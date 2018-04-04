<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;



class Shopuser extends Model
{
      use Translatable,
        HasRelationships;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     protected $fillable = ['user_id','status', 'shop_id'];
}
