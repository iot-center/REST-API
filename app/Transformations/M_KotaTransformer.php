<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Kota;
use App\M_Provinsi;

class M_KotaTransformer extends TransformerAbstract{
    public function transform(M_Kota $kota) {
        $provinsi = M_Provinsi::where("id", $kota->id_provinsi)->first();
        return [
            "id_provinsi"           => $kota->id_provinsi,
            "id_kota"           => $kota->id,
            "kota"         => $kota->nama_kota,
            "provinsi"      => $provinsi->nama_provinsi
        ];
    }
}