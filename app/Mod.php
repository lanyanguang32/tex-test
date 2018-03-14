<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;

class Mod extends Model
{
    use Translatable,
        HasRelationships;

    protected $translatable = ['name','image','image_material','recommend'];

    protected $table = 'mods';

    protected $fillable = ['name','image','image_material','recommend'];


    public function modcatid()
    {
        return $this->belongsTo(Modcat::class);
    }
}
