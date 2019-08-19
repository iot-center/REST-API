<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AgamaSeeder::class,
            // KewargaNegaraanSeeder::class,
            // StatusPerkawinanSeeder::class,
            // LevelUsersSeeder::class,
            // ProvinsiSeeder::class,
            // KotaSeeder::class,
            // KecamatanSeeder::class,
            // KelurahanSeeder::class
            // UsersSeeder::class
            GedungSeeder::class,
            LantaiSeeder::class,
            RuanganSeeder::class
        ]);
    }
}
