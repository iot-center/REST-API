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
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "nama_provinsi"      => 'required',
        ]);

        $data = $provinsi->create([
            "nama_provinsi" => $request->nama_provinsi
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Provinsi)
            ->toArray(), 200);
    }
    // Update Provinsi
    public function updateProvinsi(Request $request, M_Provinsi $provinsi) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_provinsi"   => 'required',
            "nama_provinsi"      => 'required',
        ]);

        $status = $provinsi->where([
            ["id", "=", $request->id_provinsi]
        ])->update([
            "nama_provinsi"     => $request->nama_provinsi
        ]);

        if ($status) {
            $data = $provinsi->where([
                ["id", "=", $request->id_provinsi]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Provinsi)
            ->toArray(), 200);
    }
    // Delete Provinsi
    public function deleteProvinsi(Request $request, M_Provinsi $provinsi) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $provinsi->where([
            ["id", "=", $request->id_provinsi]
        ])->get();

        $status = $provinsi->where([
            ["id", "=", $request->id_provinsi]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Provinsi)
            ->toArray(), 200);
    }
    
    // Create Kota
    public function createKota(Request $request, M_Kota $kota) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_provinsi"    => 'required',
            "nama_kota"      => 'required'
        ]);

        $data = $kota->create([
            "id_provinsi" => $request->id_provinsi,
            "nama_kota" => $request->nama_kota
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Kota)
            ->toArray(), 200);
    }
    // Update Kota
    public function updateKota(Request $request, M_Kota $kota) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_kota"   => 'required',
            "id_provinsi"   => 'required',
            "nama_kota"      => 'required',
        ]);

        $status = $kota->where([
            ["id", "=", $request->id_kota]
        ])->update([
            "id_provinsi"     => $request->id_provinsi,
            "nama_kota"     => $request->nama_kota
        ]);

        if ($status) {
            $data = $kota->where([
                ["id", "=", $request->id_kota]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Kota)
            ->toArray(), 200);
    }
    // Delete Kota
    public function deleteKota(Request $request, M_Kota $kota) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kota->where([
            ["id", "=", $request->id_kota]
        ])->get();

        $status = $kota->where([
            ["id", "=", $request->id_kota]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Kota)
            ->toArray(), 200);
    }

    // Create Kecamatan
    public function createKecamatan(Request $request, M_Kecamatan $kecamatan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_kota"    => 'required',
            "nama_kecamatan"      => 'required'
        ]);

        $data = $kecamatan->create([
            "id_kota" => $request->id_kota,
            "nama_kecamatan" => $request->nama_kecamatan
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Kecamatan)
            ->toArray(), 200);
    }
    // Update Kecamatan
    public function updateKecamatan(Request $request, M_Kecamatan $kecamatan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_kecamatan"   => 'required',
            "id_kota"   => 'required',
            "nama_kecamatan"      => 'required',
        ]);

        $status = $kecamatan->where([
            ["id", "=", $request->id_kecamatan]
        ])->update([
            "id_kota"     => $request->id_kota,
            "nama_kecamatan"     => $request->nama_kecamatan
        ]);

        if ($status) {
            $data = $kecamatan->where([
                ["id", "=", $request->id_kecamatan]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Kecamatan)
            ->toArray(), 200);
    }
    // Delete Kecamatan
    public function deleteKecamatan(Request $request, M_Kecamatan $kecamatan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kecamatan->where([
            ["id", "=", $request->id_kecamatan]
        ])->get();

        $status = $kecamatan->where([
            ["id", "=", $request->id_kecamatan]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Kecamatan)
            ->toArray(), 200);
    }

    // Create Kelurahan
    public function createKelurahan(Request $request, M_Kelurahan $kelurahan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_kecamatan"    => 'required',
            "nama_kelurahan"      => 'required'
        ]);

        $data = $kelurahan->create([
            "id_kecamatan" => $request->id_kecamatan,
            "nama_kelurahan" => $request->nama_kelurahan
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Kelurahan)
            ->toArray(), 200);
    }
    // Update Kelurahan
    public function updateKelurahan(Request $request, M_Kelurahan $kelurahan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_kelurahan"   => 'required',
            "id_kecamatan"   => 'required',
            "nama_kelurahan"      => 'required',
        ]);

        $status = $kelurahan->where([
            ["id", "=", $request->id_kelurahan]
        ])->update([
            "id_kecamatan"     => $request->id_kecamatan,
            "nama_kelurahan"     => $request->nama_kelurahan
        ]);

        if ($status) {
            $data = $kelurahan->where([
                ["id", "=", $request->id_kelurahan]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Kelurahan)
            ->toArray(), 200);
    }
    // Delete Kelurahan
    public function deleteKelurahan(Request $request, M_Kelurahan $kelurahan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kelurahan->where([
            ["id", "=", $request->id_kelurahan]
        ])->get();

        $status = $kelurahan->where([
            ["id", "=", $request->id_kelurahan]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Kelurahan)
            ->toArray(), 200);
    }

    // Create Kewarga Negaraan
    public function createKewargaNegaraan(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "kewarga_negaraan"      => 'required'
        ]);

        $data = $kewarga_negaraan->create([
            "kewarga_negaraan" => $request->kewarga_negaraan
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_KewargaNegaraan)
            ->toArray(), 200);
    }
    // Update Kewarga Negaraan
    public function updateKewargaNegaraan(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_kewarga_negaraan"   => 'required',
            "kewarga_negaraan"      => 'required',
        ]);

        $status = $kewarga_negaraan->where([
            ["id", "=", $request->id_kewarga_negaraan]
        ])->update([
            "kewarga_negaraan"     => $request->kewarga_negaraan
        ]);

        if ($status) {
            $data = $kewarga_negaraan->where([
                ["id", "=", $request->id_kewarga_negaraan]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_KewargaNegaraan)
            ->toArray(), 200);
    }
    // Delete Kewarga Negaraan
    public function deleteKewargaNegaraan(Request $request, M_KewargaNegaraan $kewarga_negaraan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $kewarga_negaraan->where([
            ["id", "=", $request->id_kewarga_negaraan]
        ])->get();

        $status = $kewarga_negaraan->where([
            ["id", "=", $request->id_kewarga_negaraan]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_KewargaNegaraan)
            ->toArray(), 200);
    }

    // Create Status Kawin
    public function createStatusKawin(Request $request, M_StatusPerkawinan $status_perkawinan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "status"      => 'required'
        ]);

        $data = $status_perkawinan->create([
            "status" => $request->status
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_StatusPerkawinan)
            ->toArray(), 200);
    }
    // Update Status Kawin
    public function updateStatusKawin(Request $request, M_StatusPerkawinan $status_perkawinan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_status_perkawinan"   => 'required',
            "status_perkawinan"      => 'required',
        ]);

        $status = $status_perkawinan->where([
            ["id", "=", $request->id_status_perkawinan]
        ])->update([
            "status"     => $request->status_perkawinan
        ]);

        if ($status) {
            $data = $status_perkawinan->where([
                ["id", "=", $request->id_status_perkawinan]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_StatusPerkawinan)
            ->toArray(), 200);
    }
    // Delete Status Kawin
    public function deleteStatusKawin(Request $request, M_StatusPerkawinan $status_perkawinan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $status_perkawinan->where([
            ["id", "=", $request->id_status_perkawinan]
        ])->get();

        $status = $status_perkawinan->where([
            ["id", "=", $request->id_status_perkawinan]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_StatusPerkawinan)
            ->toArray(), 200);
    }

}
