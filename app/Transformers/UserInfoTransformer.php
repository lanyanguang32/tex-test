<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserInfoTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
        	'id' => $user->id,
        	'phone' => $user->phone,
            'name' => $user->name,
            'avatar' => \Voyager::image($user->avatar), //余额
            'admin' => $user->is_admin(), //余额
        ];
    }
}
