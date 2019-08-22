<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Lantai;
use App\M_Gedung;

class M_LantaiTransformer extends TransformerAbstract{
    public function transform(M_Lantai $lantai) {
        $gedung = M_Gedung::where("id", $lantai->id_gedung)->first();
        return [
            "id_gedung"           => $lantai->id_gedung,
            "id_lantai"         => $lantai->id,
            "nama_lantai"    => $lantai->nama_lantai,
            "nama_gedung"    => $gedung->nama_gedung
        ];
    }
}