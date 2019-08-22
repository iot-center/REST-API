<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_KewargaNegaraan;

class M_KewargaNegaraanTransformer extends TransformerAbstract{
    public function transform(M_KewargaNegaraan $kewarga_negaraan) {
        return [
            "id_kewarga_negaraan"   => $kewarga_negaraan->id,
            "kewarga_negaraan"       => $kewarga_negaraan->kewarga_negaraan
        ];
    }
}