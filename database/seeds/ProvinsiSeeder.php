<?php

use Illuminate\Database\Seeder;
use App\M_Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = new M_Provinsi();
        $items = [
            "NANGGROE ACEH DARUSSALAM",
            "SUMATERA UTARA",
            "SUMATERA BARAT",
            "RIAU",
            "JAMBI",
            "SUMATERA SELATAN",
            "BENGKULU",
            "LAMPUNG",
            "KEP. BANGKA BELITUNG",
            "KEPULAUAN RIAU",
            "DKI JAKARTA",
            "JAWA BARAT",
            "JAWA TENGAH",
            "D I YOGYAKARTA",
            "JAWA TIMUR",
            "BANTEN",
            "B A L I",
            "NUSA TENGGARA BARAT",
            "NUSA TENGGARA TIMUR",
            "KALIMANTAN BARAT",
            "KALIMANTAN TENGAH",
            "KALIMANTAN SELATAN",
            "KALIMANTAN TIMUR",
            "SULAWESI UTARA",
            "SULAWESI TENGAH",
            "SULAWESI SELATAN",
            "SULAWESI TENGGARA",
            "GORONTALO",
            "M A L U K U",
            "MALUKU UTARA",
            "PAPUA BARAT",
            "PAPUA",
            "SULAWESI BARAT",
            "KALIMANTAN UTARA"
        ];
        
        // Insert Daftar Agama
        foreach ($items as $item) {
            $table->insert([
                "nama_provinsi" => $item
            ]);
        }
    }
}
