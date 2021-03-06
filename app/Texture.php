<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;
use TCG\Voyager\Traits\Translatable;


class Texture extends Model
{
 

            use Translatable,
        HasRelationships;

         protected $fillable = ['shop_id','receivername','receiverphone', 'recevierprovince', 'receviercity', 'recevierarea', 'recevierstreet', 'receiveraddress', 'tid', 'user_id'];

	public function userId()
    {
        return $this->hasMany(Voyager::modelClass('User'));
    }

         public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }

        //$this->tid = time().date('Ymd').rand(1001,9299);

        parent::save();
    }
       
    
    public function skus()
    {
        return $this->belongsTo(Texturesku::class, 'tid', 'tid');
    }
}
