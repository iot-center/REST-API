<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Device;
use App\M_Gedung;
use App\M_Lantai;
use App\M_Ruangan;

class M_DeviceTransformer extends TransformerAbstract{
    public function transform(M_Device $device) {
        $gedung = M_Gedung::where("id", $device->id_gedung)->first();
        $lantai = M_Lantai::where("id", $device->id_lantai)->first();
        $ruangan = M_Ruangan::where("id", $device->id_ruangan)->first();
        return [
            "id_device" => $device->id,
            "id_gedung" => $device->id_gedung,
            "id_lantai" => $device->id_lantai,
            "id_ruangan"    => $device->id_ruangan,
            "nama_gedung"   => $gedung->nama_gedung . " (" . $gedung->singkatan_gedung . ")",
            "nama_lantai"   => $lantai->nama_lantai,
            "nama_ruangan"  => $ruangan->nama_ruangan,
            "uri"           => $device->uri
        ];
    }
}