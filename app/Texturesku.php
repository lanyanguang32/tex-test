<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Texturesku extends Model
{
    protected $table = 'textureskus';

    protected $fillable = ['title','image', 'material', 'weight', 'user_id', 'shop_id','tid'];

}
