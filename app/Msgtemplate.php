<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;



class Msgtemplate extends Model
{
	   use Translatable,
        Resizable,
        HasRelationships;

     protected $table = 'msgtemplate';

     protected $guarded = [];


     public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
    }
}
