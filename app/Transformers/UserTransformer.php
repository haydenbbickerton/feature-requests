<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'id'           => $user->id,
            'first_name'   => $user->first_name,
            'last_name'    => $user->last_name,
            'display_name' => $user->display_name,
            'email'        => $user->email,
            'picture'      => $user->picture,
        ];
    }
}
