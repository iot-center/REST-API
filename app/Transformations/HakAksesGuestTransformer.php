<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\HakAksesGuest;
use App\M_HakAksesGuest;
use App\M_Gedung;
use App\M_Lantai;
use App\M_Ruangan;

class HakAksesGuestTransformer extends TransformerAbstract{
    public function transform(HakAksesGuest $hak_akses) {
        $master_hak_akses = M_HakAksesGuest::where("id", $hak_akses->id_hak_akses)->first();
        $gedung = M_Gedung::where("id", $master_hak_akses->id_gedung)->first();
        $lantai = M_Lantai::where("id", $master_hak_akses->id_lantai)->first();
        $ruangan = M_Ruangan::where("id", $master_hak_akses->id_ruangan)->first();
        return [
            "id"    => $hak_akses->id,
            "id_user"   => $hak_akses->id_user,
            "id_hak_akses"  => $hak_akses->id_hak_akses,
            "id_gedung" => $master_hak_akses->id_gedung,
            "id_lantai" => $master_hak_akses->id_lantai,
            "id_ruangan"    => $master_hak_akses->id_ruangan,
            "nama_gedung"   => $gedung->nama_gedung . " (" . $gedung->singkatan_gedung . ")",
            "nama_lantai"   => $lantai->nama_lantai,
            "nama_ruangan"  => $ruangan->nama_ruangan
        ];
    }
}