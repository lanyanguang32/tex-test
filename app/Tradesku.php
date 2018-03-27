<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;


class Tradesku extends Model
{
    
            use Translatable,
        HasRelationships;

         protected $fillable = ['title','price','num','tid', 'image'];
}