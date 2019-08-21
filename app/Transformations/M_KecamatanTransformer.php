<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Kecamatan;

class M_KecamatanTransformer extends TransformerAbstract{
    public function transform(M_Kecamatan $kecamatan) {
        return [
            "id_kota"           => $kecamatan->id_kota,
            "kecamatan"         => $kecamatan->nama_kecamatan
        ];
    }
}