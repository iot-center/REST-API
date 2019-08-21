<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Provinsi;

class M_ProvinsiTransformer extends TransformerAbstract{
    public function transform(M_Provinsi $provinsi) {
        return [
            "provinsi"         => $provinsi->nama_provinsi
        ];
    }
}