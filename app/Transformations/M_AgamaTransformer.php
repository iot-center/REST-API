<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Agama;

class M_AgamaTransformer extends TransformerAbstract{
    public function transform(M_Agama $agama) {
        return [
            "id_agama"           => $agama->id,
            "agama"         => $agama->agama
        ];
    }
}