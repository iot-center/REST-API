<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract{
    public function transform(User $user) {
        return [
            "id_user"       => $user->nik,
            "full_name"     => $user->nama,
            "email"         => $user->email,
            "token"         => $user->api_token,
            "type"          => $user->id_level
        ];
    }
}