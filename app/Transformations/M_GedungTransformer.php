<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Gedung;

class M_GedungTransformer extends TransformerAbstract{
    public function transform(M_Gedung $gedung) {
        return [
            "id_gedung"           => $gedung->id,
            "nama_gedung"         => $gedung->nama_gedung,
            "singkatan_gedung"    => $gedung->singkatan_gedung
        ];
    }
}