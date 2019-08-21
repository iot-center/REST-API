<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_LevelUser;

class M_LevelUserTransformer extends TransformerAbstract{
    public function transform(M_LevelUser $level) {
        return [
            "level"       => $level->level
        ];
    }
}