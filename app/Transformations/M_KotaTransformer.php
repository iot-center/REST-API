<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Kota;

class M_KotaTransformer extends TransformerAbstract{
    public function transform(M_Kota $kota) {
        return [
            "id_provinsi"           => $kota->id_provinsi,
            "kota"         => $kota->nama_kota
        ];
    }
}