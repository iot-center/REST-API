<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Kelurahan;

class M_KelurahanTransformer extends TransformerAbstract{
    public function transform(M_Kelurahan $kelurahan) {
        return [
            "id_kecamatan"       => $kelurahan->id_kecamatan,
            "kelurahan"          => $kelurahan->nama_kelurahan
        ];
    }
}