<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;


class Modcat extends Model
{
    use Translatable,
        HasRelationships;

    protected $translatable = ['slug', 'name'];

    protected $table = 'modcats';

    protected $fillable = ['slug', 'name'];
    
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function mods()
    {
    	return $this->hasMany(Mod::class);
    }
}
