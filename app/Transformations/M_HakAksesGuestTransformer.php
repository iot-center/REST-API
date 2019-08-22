<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_HakAksesGuest;

class M_HakAksesGuestTransformer extends TransformerAbstract{
    public function transform(M_HakAksesGuest $hak_akses) {
        return [
            "id"    => $hak_akses->id,
            "id_gedung"   => $hak_akses->id_gedung,
            "id_lantai"   => $hak_akses->id_lantai,
            "id_ruangan"   => $hak_akses->id_ruangan
        ];
    }
}