<?php

use Illuminate\Database\Seeder;
use App\M_KewargaNegaraan;

class KewargaNegaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_KewargaNegaraan();
        $items = [
            "WNI",
            "WNA"
        ];

        // Insert Daftar Kewarganegaraan
        foreach ($items as $item) {
            $table->insert([
                "kewarga_negaraan"   => $item
            ]);
        }
    }
}
