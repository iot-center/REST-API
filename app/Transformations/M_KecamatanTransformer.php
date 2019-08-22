<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Kecamatan;
use App\M_Kota;

class M_KecamatanTransformer extends TransformerAbstract{
    public function transform(M_Kecamatan $kecamatan) {
        $kota = M_Kota::where("id", $kecamatan->id_kota)->first();
        return [
            "id_kota"           => $kecamatan->id_kota,
            "id_kecamatan"      => $kecamatan->id,
            "kota"              => $kota->nama_kota,
            "kecamatan"         => $kecamatan->nama_kecamatan
        ];
    }
}