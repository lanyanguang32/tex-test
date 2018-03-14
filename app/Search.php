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

    public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

}
