<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Ruangan;

class M_RuanganTransformer extends TransformerAbstract{
    public function transform(M_Ruangan $ruangan) {
        return [
            "id_lantai"           => $ruangan->id_lantai,
            "id_ruangan"         => $ruangan->id,
            "nama_ruangan"    => $ruangan->nama_ruangan
        ];
    }
}