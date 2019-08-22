<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\HakAksesGuest;

class HakAksesGuestTransformer extends TransformerAbstract{
    public function transform(HakAksesGuest $hak_akses) {
        return [
            "id"    => $hak_akses->id,
            "id_user"   => $hak_akses->id_user,
            "id_hak_akses"  => $hak_akses->id_hak_akses
        ];
    }
}