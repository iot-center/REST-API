<?php

namespace App\Transformations;

use League\Fractal\TransformerAbstract;
use App\DataDevice;

class DataDeviceTransformer extends TransformerAbstract{
    public function transform(DataDevice $data_device) {
        return [
            "id_data" => $data_device->id,
            "id_device" => $data_device->id_device,
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