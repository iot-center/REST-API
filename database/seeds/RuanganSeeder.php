<?php

use Illuminate\Database\Seeder;
use App\M_Ruangan;

class RuanganSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_Ruangan();
        $items = [
            [1, "Ruang Admin Perhotelan"],
            [2, "Ruang Admin Komputer"],
            [4, "Ruang Admin Teknik"],
        ];
        
        // Insert Daftar Gedung
        foreach ($items as $item) {
            $table->insert([
                "id_lantai" => $item[0],
                "nama_ruangan" => $item[1]
            ]);
        }
    }
}
