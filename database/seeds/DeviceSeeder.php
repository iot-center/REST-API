<?php

use Illuminate\Database\Seeder;
use App\M_Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_Device();
        $items = [
            [1, 2, 2, "https://platform.antares.id:8443/~/antares-cse/antares-id/EnergyMonitoring/Device1"]
        ];
        
        // Insert Daftar Gedung
        foreach ($items as $item) {
            $table->insert([
                "id_gedung" => $item[0],
                "id_lantai" => $item[1],
                "id_ruangan" => $item[2],
                "uri" => $item[3]
            ]);
        }
    }
}
