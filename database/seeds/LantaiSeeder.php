<?php

use Illuminate\Database\Seeder;
use App\M_Lantai;

class LantaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_Lantai();
        $items = [
            [1, "Lantai 1"],
            [1, "Lantai 2"],
            [1, "Lantai 3"],
            [1, "Lantai 4"]
        ];
        
        // Insert Daftar Gedung
        foreach ($items as $item) {
            $table->insert([
                "id_gedung" => $item[0],
                "nama_lantai" => $item[1]
            ]);
        }
    }
}
