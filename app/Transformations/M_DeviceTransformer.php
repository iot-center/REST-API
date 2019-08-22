<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\M_Device;

class M_DeviceTransformer extends TransformerAbstract{
    public function transform(M_Device $device) {
        return [
            "id_device" => $device->id,
            "id_gedung" => $device->id_gedung,
            "id_lantai" => $device->id_lantai,
            "id_ruangan"    => $device->id_ruangan,
            "uri"           => $device->uri
        ];
    }
}