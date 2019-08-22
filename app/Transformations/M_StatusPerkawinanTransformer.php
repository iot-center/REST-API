<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_StatusPerkawinan;

class M_StatusPerkawinanTransformer extends TransformerAbstract{
    public function transform(M_StatusPerkawinan $status_perkawinan) {
        return [
            "id_status"     => $status_perkawinan->id,
            "status"       => $status_perkawinan->status
        ];
    }
}