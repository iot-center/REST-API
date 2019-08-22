<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Ruangan;
use App\M_Lantai;

class M_RuanganTransformer extends TransformerAbstract{
    public function transform(M_Ruangan $ruangan) {
        $lantai = M_Lantai::where("id", $ruangan->id_lantai)->first();
        return [
            "id_lantai"           => $ruangan->id_lantai,
            "id_ruangan"         => $ruangan->id,
            "nama_ruangan"    => $ruangan->nama_ruangan,
            "nama_lantai"   => $lantai->nama_lantai
        ];
    }
}