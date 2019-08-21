<?php

namespace App\Http\Controllers;

use App\Transformations\M_LevelUserTransformer;
use App\Transformations\M_ProvinsiTransformer;
use App\Transformations\M_KotaTransformer;
use App\Transformations\M_KecamatanTransformer;
use App\Transformations\M_KelurahanTransformer;
use App\Transformations\M_KewargaNegaraanTransformer;
use App\Transformations\M_StatusPerkawinanTransformer;
use Illuminate\Http\Request;
use App\M_LevelUser;
use App\M_Provinsi;
use App\M_Kota;
use App\M_Kecamatan;
use App\M_Kelurahan;
use App\M_KewargaNegaraan;
use App\M_StatusPerkawinan;
use Auth;
use Hash;

class API_SuperAdmin extends Controller {

    // Create Level User
    public function createLevelUser(Request $request, M_LevelUser $level) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "level"      => 'required',
        ]);

        $data = $level->create([
            "level" => $request->level
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray(), 200);
    }
    // Delete Level User
    public function deleteLevelUser(Request $request, M_LevelUser $level) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $level->where([
            ["id_level", "=", $request->id_level]
        ])->get();

        $status = $kategori->where([
            ["id_level", "=", $request->id_level]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray(), 200);
    }
    // Update Level User
    public function updateLevelUser(Request $request, M_LevelUser $level) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_level"   => 'required',
            "level"      => 'required',
        ]);

        $status = $kategori->where([
            ["id_level", "=", $request->id_level]
        ])->update([
            "level"     => $request->level
        ]);

        if ($status) {
            $data = $level->where([
                ["id_level", "=", $request->id_level]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray(), 200);
    }

    // Create Provinsi
    public function createProvinsi(Request $request, M_Provinsi $provinsi) {

    }
    // Update Provinsi
    public function updateProvinsi(Request $request, M_Provinsi $provinsi) {

    }
    // Delete Provinsi
    public function deleteProvinsi(Request $request, M_Provinsi $provinsi) {

    }
    
    // Create Kota
    public function createKota(Request $request, M_Kota $kota) {

    }
    // Update Kota
    public function updateKota(Request $request, M_Kota $kota) {

    }
    // Delete Kota
    public function deleteKota(Request $request, M_Kota $kota) {

    }

    // Create Kecamatan
    public function createKecamatan(Request $request, M_Kecamatan $kecamatan) {

    }
    // Update Kecamatan
    public function updateKecamatan(Request $request, M_Kecamatan $kecamatan) {
        
    }
    // Delete Kecamatan
    public function deleteKecamatan(Request $request, M_Kecamatan $kecamatan) {
        
    }

    // Create Kelurahan
    public function createKelurahan(Request $request, M_Kelurahan $kelurahan) {
        
    }
    // Update Kelurahan
    public function updateKelurahan(Request $request, M_Kelurahan $kelurahan) {
        
    }
    // Delete Kelurahan
    public function deleteKelurahan(Request $request, M_Kelurahan $kelurahan) {
        
    }

    // Create Kewarga Negaraan
    public function createKewargaNegaraan(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        
    }
    // Update Kewarga Negaraan
    public function updateKewargaNegaraan(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        
    }
    // Delete Kewarga Negaraan
    public function deleteKewargaNegaraan(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        
    }

    // Create Status Kawin
    public function createStatusKawin(Request $request, M_StatusPerkawinan $status_perkawinan) {
        
    }
    // Update Status Kawin
    public function updateStatusKawin(Request $request, M_StatusPerkawinan $status_perkawinan) {
        
    }
    // Delete Status Kawin
    public function deleteStatusKawin(Request $request, M_StatusPerkawinan $status_perkawinan) {
        
    }

}
