<?php

use Illuminate\Database\Seeder;
use App\HakAksesGuest;

class HakAksesGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new HakAksesGuest();
        $items = [
            [3, 1],
            [3, 2],
            [3, 3]
        ];
        
        // Insert Daftar Hak Akses Guest
        foreach ($items as $item) {
            $table->insert([
                "id_user" => $item[0],
                "id_hak_akses" => $item[1]
            ]);
        }
    }
}
