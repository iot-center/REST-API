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

class API_Umum extends Controller {
    
    // Get Level User All
    public function getUserLevelAll(M_LevelUser $level) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $level->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray();
    }
    // Get Level User By ID
    public function getUserLevelByID(Request $request, M_LevelUser $level) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $level->where([
            ["id", "=", $request->id_level]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray();
    }

    // Get Provinsi All
    public function getProvinsiAll(M_Provinsi $provinsi) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $provinsi->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_ProvinsiTransformer)
            ->toArray();
    }
    // Get Provinsi By ID
    public function getProvinsiByID(Request $request, M_Provinsi $provinsi) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $provinsi->where([
            ["id", "=", $request->id_provinsi]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_ProvinsiTransformer)
            ->toArray();
    }

    // Get Kota All
    public function getKotaAll(M_Kota $kota) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kota->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_KotaTransformer)
            ->toArray();
    }
    // Get Kota By Provinsi ID
    public function getKotaByProvinsiID(Request $request, M_Kota $kota) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kota->where([
            ["id_provinsi", "=", $request->id_provinsi]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KotaTransformer)
            ->toArray();
    }
    // Get Kota By ID
    public function getKotaByID(Request $request, M_Kota $kota) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kota->where([
            ["id", "=", $request->id_kota]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KotaTransformer)
            ->toArray();
    }

    // Get Kecamatan All
    public function getKecamatanAll(M_Kecamatan $kecamatan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kecamatan->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_KecamatanTransformer)
            ->toArray();
    }
    // Get Kecamatan By Kota ID
    public function getKecamatanByKotaID(Request $request, M_Kecamatan $kecamatan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kecamatan->where([
            ["id_kota", "=", $request->id_kota]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KecamatanTransformer)
            ->toArray();
    }
    // Get Kecamatan By ID
    public function getKecamatanByID(Request $request, M_Kecamatan $kecamatan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kecamatan->where([
            ["id", "=", $request->id_kecamatan]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KecamatanTransformer)
            ->toArray();
    }

    // Get Kelurahan All
    public function getKelurahanAll(M_Kelurahan $kelurahan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kelurahan->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_KelurahanTransformer)
            ->toArray();
    }
    // Get Kelurahan By Kecamatan ID
    public function getKelurahanByKecamatanID(Request $request, M_Kelurahan $kelurahan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kelurahan->where([
            ["id_kecamatan", "=", $request->id_kecamatan]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KelurahanTransformer)
            ->toArray();
    }
    // Get Kelurahan By ID
    public function getKelurahanByID(Request $request, M_Kelurahan $kelurahan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kelurahan->where([
            ["id", "=", $request->id_kelurahan]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KelurahanTransformer)
            ->toArray();
    }

    // Get Status Perkawinan All
    public function getStatusPerkawinanAll(M_StatusPerkawinan $status_perkawinan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $status_perkawinan->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_StatusPerkawinanTransformer)
            ->toArray();
    }
    // Get Status Perkawinan By ID
    public function getStatusPerkawinanByID(Request $request, M_StatusPerkawinan $status_perkawinan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $status_perkawinan->where([
            ["id", "=", $request->id_status_perkawinan]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_StatusPerkawinanTransformer)
            ->toArray();
    }

    // Get Kewarga Negaraan All
    public function getKewargaNegaraanAll(M_KewargaNegaraan $kewarga_negaraan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kewarga_negaraan->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_KewargaNegaraanTransformer)
            ->toArray();
    }
    // Get Kewarga Negaraan By ID
    public function getKewargaNegaraanByID(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kewarga_negaraan->where([
            ["id", "=", $request->id_kewarga_negaraan]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_KewargaNegaraanTransformer)
            ->toArray();
    }

}
