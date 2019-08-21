<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_StatusPerkawinan;

class M_StatusPerkawinanTransformer extends TransformerAbstract{
    public function transform(M_StatusPerkawinan $status_perkawinan) {
        return [
            "status"       => $status_perkawinan->status
        ];
    }
}