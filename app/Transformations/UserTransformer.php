<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract{
    public function transform(User $user) {
        return [

        ];
    }
}