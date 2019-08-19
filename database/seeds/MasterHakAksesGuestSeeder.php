<?php

use Illuminate\Database\Seeder;
use App\M_HakAksesGuest;

class MasterHakAksesGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_HakAksesGuest();
        $items = [
            [1, 1, 1],
            [1, 2, 2],
            [1, 4, 3],
        ];
        
        // Insert Daftar Master Hak Akses Guest
        foreach ($items as $item) {
            $table->insert([
                "id_gedung" => $item[0],
                "id_lantai" => $item[1],
                "id_ruangan" => $item[2]
            ]);
        }
    }
}
