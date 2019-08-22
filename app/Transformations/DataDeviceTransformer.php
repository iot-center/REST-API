<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\DataDevice;
use App\M_Device;
use App\M_Gedung;
use App\M_Lantai;
use App\M_Ruangan;

class DataDeviceTransformer extends TransformerAbstract{
    public function transform(DataDevice $data_device) {
        $device = M_Device::where("id", $data_device->id_device)->first();
        $gedung = M_Gedung::where("id", $device->id_gedung)->first();
        $lantai = M_Lantai::where("id", $device->id_lantai)->first();
        $ruangan = M_Ruangan::where("id", $device->id_ruangan)->first();
        return [
            "id_data" => $data_device->id,
            "id_device" => $data_device->id_device,
            "id_gedung" => $device->id_gedung,
            "id_lantai" => $device->id_lantai,
            "id_ruangan" => $device->id_ruangan,
            "gedung" => $gedung->nama_gedung,
            "lantai" => $lantai->nama_lantai,
            "ruangan" => $ruangan->nama_ruangan,
            "uri" => $device->uri,
            "Va"    => $data_device->Va,
            "Vb"    => $data_device->Vb,
            "Vc"    => $data_device->Vc,
            "Vab"    => $data_device->Vab,
            "Vbc"    => $data_device->Vbc,
            "Vca"    => $data_device->Vca,
            "Ia"    => $data_device->Ia,
            "Ib"    => $data_device->Ib,
            "Ic"    => $data_device->Ic,
            "Pa"    => $data_device->Pa,
            "Pb"    => $data_device->Pb,
            "Pc"    => $data_device->Pc,
            "Qa"    => $data_device->Qa,
            "Qb"    => $data_device->Qb,
            "Qc"    => $data_device->Qc,
            "Sa"    => $data_device->Sa,
            "Sb"    => $data_device->Sb,
            "Sc"    => $data_device->Sc,
            "PFa"    => $data_device->PFa,
            "PFb"    => $data_device->PFb,
            "PFc"    => $data_device->PFc,
            "Freq"    => $data_device->Freq,
            "TAE"    => $data_device->TAE,
            "timestamp" => $data_device->created_at
        ];
    }
}