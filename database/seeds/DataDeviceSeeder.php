<?php

use Illuminate\Database\Seeder;
use App\DataDevice;

class DataDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new DataDevice();
        $items = [
            [
                1,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0
            ]
        ];
        
        // Insert Daftar Gedung
        foreach ($items as $item) {
            $table->insert([
                "id_device" => $item[0],
                "Va"    => $item[1],
                "Vb"    => $item[2],
                "Vc"    => $item[3],
                "Vab"   => $item[4],
                "Vbc"   => $item[5],
                "Vca"   => $item[6],
                "Ia"    => $item[7],
                "Ib"    => $item[8],
                "Ic"    => $item[9],
                "Pa"    => $item[10],
                "Pb"    => $item[11],
                "Pc"    => $item[12],
                "Qa"    => $item[13],
                "Qb"    => $item[14],
                "Qc"    => $item[15],
                "Sa"    => $item[16],
                "Sb"    => $item[17],
                "Sc"    => $item[18],
                "PFa"   => $item[19],
                "PFb"   => $item[20],
                "PFc"   => $item[21],
                "Freq"  => $item[22],
                "TAE"   => $item[23]
            ]);
        }
    }
}
