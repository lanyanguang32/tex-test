<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
	    use Translatable,
        Resizable,
        HasRelationships;


    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->poster_id && Auth::user()) {
            $this->poster_id = Auth::user()->id;
        }

        if (!$this->hash && $this->image) {
            $this->hash = '';
        }

        parent::save();
    }


    public function posterId()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'poster_id', 'id');
    }

}
