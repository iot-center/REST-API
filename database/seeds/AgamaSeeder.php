<?php

use Illuminate\Database\Seeder;
use App\M_Agama;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_Agama();
        $items = [
            "Islam",
            "Kristen Protestan",
            "Katolik",
            "Hindu",
            "Buddha",
            "Kong Hu Cu"
        ];
        
        // Insert Daftar Agama
        foreach ($items as $item) {
            $table->insert([
                "agama" => $item
            ]);
        }
    }
}
