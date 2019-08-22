<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Kecamatan;
use App\M_Kelurahan;

class M_KelurahanTransformer extends TransformerAbstract{
    public function transform(M_Kelurahan $kelurahan) {
        $kecamatan = M_Kecamatan::where("id", $kelurahan->id_kecamatan)->first();
        return [
            "id_kecamatan"       => $kelurahan->id_kecamatan,
            "id_kelurahan"      => $kelurahan->id,
            "kelurahan"          => $kelurahan->nama_kelurahan,
            "kecamatan"          => $kecamatan->nama_kecamatan,
        ];
    }
}