<?php

use Illuminate\Database\Seeder;
use App\M_Gedung;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_Gedung();
        $items = [
            ["Fakultas Ilmu Terapan (FIT)", "Gd.Selaru"],
            ["Rektorat", "Gd.Bankit"]
        ];
        
        // Insert Daftar Gedung
        foreach ($items as $item) {
            $table->insert([
                "nama_gedung" => $item[0],
                "singkatan_gedung" => $item[1]
            ]);
        }
    }
}
