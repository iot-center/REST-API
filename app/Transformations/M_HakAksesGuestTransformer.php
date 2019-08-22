<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_HakAksesGuest;
use App\M_Gedung;
use App\M_Lantai;
use App\M_Ruangan;

class M_HakAksesGuestTransformer extends TransformerAbstract{
    public function transform(M_HakAksesGuest $hak_akses) {
        $gedung = M_Gedung::where("id", $hak_akses->id_gedung)->first();
        $lantai = M_Lantai::where("id", $hak_akses->id_lantai)->first();
        $ruangan = M_Ruangan::where("id", $hak_akses->id_ruangan)->first();
        return [
            "id"    => $hak_akses->id,
            "id_gedung"   => $hak_akses->id_gedung,
            "id_lantai"   => $hak_akses->id_lantai,
            "id_ruangan"   => $hak_akses->id_ruangan,
            "nama_gedung"   => $gedung->nama_gedung . " (" . $gedung->singkatan_gedung . ")",
            "nama_lantai"   => $lantai->nama_lantai,
            "nama_ruangan"  => $ruangan->nama_ruangan
        ];
    }
}