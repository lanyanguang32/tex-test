<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tagcat extends Model
{
    
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

}
