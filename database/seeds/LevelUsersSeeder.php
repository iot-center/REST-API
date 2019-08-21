<?php

use Illuminate\Database\Seeder;
use App\M_LevelUser;

class LevelUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_LevelUser();
        $items = [
            "Superadmin",
            "Useradmin",
            "Guest",
            "Not Active"
        ];

        // Insert Daftar Level User
        foreach ($items as $item) {
            $table->insert([
                "level"   => $item
            ]);
        }
    }
}
