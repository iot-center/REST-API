<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Lantai;

class M_LantaiTransformer extends TransformerAbstract{
    public function transform(M_Lantai $lantai) {
        return [
            "id_gedung"           => $lantai->id_gedung,
            "id_lantai"         => $lantai->id,
            "nama_lantai"    => $lantai->nama_lantai
        ];
    }
}