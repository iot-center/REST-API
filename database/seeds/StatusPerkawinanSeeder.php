<?php

use Illuminate\Database\Seeder;
use App\M_StatusPerkawinan;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_StatusPerkawinan();
        $items = [
            "Belum Kawin",
            "Kawin",
            "Cerai Hidup",
            "Cerai Mati"
        ];

        // Insert Daftar Level User
        foreach ($items as $item) {
            $table->insert([
                "status"   => $item
            ]);
        }
    }
}
