<?php

use Illuminate\Database\Seeder;
use App\User;
// use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new User();
        $items = [
            [
                "1111111111111111",
                "Andy",
                "Ujung Pandang",
                "30-06-1998",
                1,
                "B",
                "JL. Telekomunikasi No.01",
                "002",
                "006",
                1,
                2,
                4,
                3,
                1,
                2,
                1,
                "andy",
                "goingtoprofandy@gmail.com",
                "082119189690",
                Hash::make("programer123##@@l"),
                1,
                Hash::make("programer123##@@l")
            ],
            [
                "1111111111111112",
                "Maulana",
                "Bandung",
                "30-07-1998",
                1,
                "A",
                "JL. Telekomunikasi No.01",
                "002",
                "006",
                1,
                2,
                4,
                3,
                1,
                2,
                1,
                "maulana",
                "goingtoprofmaulana@gmail.com",
                "082119189691",
                Hash::make("programer123##@@l"),
                2,
                Hash::make("programer123##@@l")
            ],
            [
                "1111111111111113",
                "Yusuf",
                "DI Yokyakarta",
                "30-08-1998",
                1,
                "AB",
                "JL. Telekomunikasi No.01",
                "002",
                "006",
                1,
                2,
                4,
                3,
                1,
                2,
                1,
                "yusuf",
                "goingtoprofyusuf@gmail.com",
                "082119189692",
                Hash::make("programer123##@@l"),
                3,
                Hash::make("programer123##@@l")
            ]
        ];
        
        // Insert Daftar Users
        foreach ($items as $item) {
            $table->insert([
                "nik" => $item[0],
                "nama" => $item[1],
                "tempat_lahir" => $item[2],
                "tgl_lahir" => $item[3],
                "jenis_kelamin" => $item[4],
                "gol_darah" => $item[5],
                "alamat" => $item[6],
                "rt" => $item[7],
                "rw" => $item[8],
                "id_provinsi" => $item[9],
                "id_kota" => $item[10],
                "id_kelurahan" => $item[11],
                "id_kecamatan" => $item[12],
                "id_agama" => $item[13],
                "id_status_perkawinan" => $item[14],
                "id_kewarga_negaraan" => $item[15],
                "username" => $item[16],
                "email" => $item[17],
                "no_hp" => $item[18],
                "password" => $item[19],
                "id_level" => $item[20],
                "api_token" => $item[21]
            ]);
        }
    }
}
