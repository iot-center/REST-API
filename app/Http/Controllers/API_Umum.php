<?php

namespace App\Http\Controllers;

use App\Transformations\M_AgamaTransformer;
use App\Transformations\M_LevelUserTransformer;
use App\Transformations\M_ProvinsiTransformer;
use App\Transformations\M_KotaTransformer;
use App\Transformations\M_KecamatanTransformer;
use App\Transformations\M_KelurahanTransformer;
use App\Transformations\M_KewargaNegaraanTransformer;
use App\Transformations\M_StatusPerkawinanTransformer;
use App\Transformations\M_GedungTransformer;
use App\Transformations\M_LantaiTransformer;
use App\Transformations\M_RuanganTransformer;
use App\Transformations\M_HakAksesGuestTransformer;
use App\Transformations\HakAksesGuestTransformer;
use App\Transformations\M_DeviceTransformer;
use App\Transformations\DataDeviceTransformer;
use Illuminate\Http\Request;
use App\M_Agama;
use App\M_LevelUser;
use App\M_Provinsi;
use App\M_Kota;
use App\M_Kecamatan;
use App\M_Kelurahan;
use App\M_KewargaNegaraan;
use App\M_StatusPerkawinan;
use App\M_Gedung;
use App\M_Lantai;
use App\M_Ruangan;
use App\M_HakAksesGuest;
use App\M_Device;
use App\HakAksesGuest;
use App\DataDevice;
use Auth;
use Hash;

class API_Umum extends Controller {

    // Get Master Hak Akses User All
    public function getMasterHakAksesUserAll(M_HakAksesGuest $master_hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $master_hak_akses->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray();
    }
    // Get Master Hak Akses User By ID
    public function getMasterHakAksesUserByID(Request $request, M_HakAksesGuest $master_hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $master_hak_akses->where([
            ["id", "=", $request->id_hak_akses]
        ])->get();
        
        return fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray();
    }
    // Get Master Hak Akses User By ID Gedung
    public function getMasterHakAksesUserByGedungID(Request $request, M_HakAksesGuest $master_hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $master_hak_akses->where([
            ["id_gedung", "=", $request->id_gedung]
        ])->get();
        
        return fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray();
    }
    // Get Master Hak Akses User By ID Lantai
    public function getMasterHakAksesUserByLantaiID(Request $request, M_HakAksesGuest $master_hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $master_hak_akses->where([
            ["id_lantai", "=", $request->id_lantai]
        ])->get();
        
        return fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray();
    }
    // Get Master Hak Akses User By ID Ruangan
    public function getMasterHakAksesUserByRuanganID(Request $request, M_HakAksesGuest $master_hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $master_hak_akses->where([
            ["id_ruangan", "=", $request->id_ruangan]
        ])->get();
        
        return fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray();
    }

    // Get Hak Akses User All
    public function getHakAksesUserAll(HakAksesGuest $hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $hak_akses->all();
        return fractal()
            ->collection($data)
            ->transformWith(new HakAksesGuestTransformer)
            ->toArray();
    }
    // Get Hak Akses User By ID
    public function getHakAksesUserByID(Request $request, HakAksesGuest $hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $hak_akses->where([
            ["id_user", "=", $request->id_user]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new HakAksesGuestTransformer)
            ->toArray();
    }

    // Get Master Device All
    public function getDeviceAll(M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $device->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_DeviceTransformer)
            ->toArray();
    }
    // Get Master Device By ID Gedung
    public function getDeviceByGedungID(Request $request, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $device->where([
            ["id_gedung", "=", $request->id_gedung]
        ]);

        return fractal()
            ->collection($data)
            ->transformWith(new M_DeviceTransformer)
            ->toArray();
    }
    // Get Master Device By ID Lantai
    public function getDeviceByLantaiID(Request $request, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $device->where([
            ["id_lantai", "=", $request->id_lantai]
        ]);
        
        return fractal()
            ->collection($data)
            ->transformWith(new M_DeviceTransformer)
            ->toArray();
    }
    // Get Master Device By ID Ruangan
    public function getDeviceByRuanganID(Request $request, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $device->where([
            ["id_ruangan", "=", $request->id_ruangan]
        ]);
        
        return fractal()
            ->collection($data)
            ->transformWith(new M_DeviceTransformer)
            ->toArray();
    }

    // Get Data Device All
    public function getDataDeviceAll(DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $data_device->all();
        return fractal()
            ->collection($data)
            ->transformWith(new DataDeviceTransformer)
            ->toArray();
    }
    // Get Data Device By Device ID
    public function getDataDeviceByDeviceID(Request $request, DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $data_device->where([
            ["id_device", "=", $request->id_device]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new DataDeviceTransformer)
            ->toArray();
    }
    // Get Data Device By Device Gedung ID
    public function getDataDeviceByGedungID(Request $request, DataDevice $data_device, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $find_device = $device->where([
            ["id_gedung", "=", $request->id_gedung]
        ])->first();

        $data = $data_device->where([
            ["id", "=", $find_device->id]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new DataDeviceTransformer)
            ->toArray();
    }
    // Get Data Device By Device Lantai ID
    public function getDataDeviceByLantaiID(Request $request, DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $find_device = $device->where([
            ["id_lantai", "=", $request->id_lantai]
        ])->first();

        $data = $data_device->where([
            ["id", "=", $find_device->id]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new DataDeviceTransformer)
            ->toArray();
    }
    // Get Data Device By Device Ruangan ID
    public function getDataDeviceByRuanganID(Request $request, DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $find_device = $device->where([
            ["id_ruangan", "=", $request->id_ruangan]
        ])->first();

        $data = $data_device->where([
            ["id", "=", $find_device->id]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new DataDeviceTransformer)
            ->toArray();
    }

    // Get Gedung All
    public function getGedungAll(M_Gedung $gedung) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $gedung->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_GedungTransformer)
            ->toArray();
    }
    // Get Gedung By ID
    public function getGedungByID(M_Gedung $gedung) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $gedung->where([
            ["id", "=", $request->id_gedung]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_GedungTransformer)
            ->toArray();
    }

    // Get Lantai All
    public function getLantaiAll(M_Lantai $lantai) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $lantai->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_LantaiTransformer)
            ->toArray();
    }
    // get Lantai By Gedung ID
    public function getLantaiByGedungID(M_Lantai $lantai) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $lantai->where([
            ["id_gedung", "=", $request->id_gedung]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_LantaiTransformer)
            ->toArray();
    }
    // Get Lantai By ID
    public function getLantaiByID(M_Lantai $lantai) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $lantai->where([
            ["id", "=", $request->id_lantai]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_LantaiTransformer)
            ->toArray();
    }

    // Get Ruangan All
    public function getRuanganAll(M_Ruangan $ruangan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $ruangan->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_RuanganTransformer)
            ->toArray();
    }
    // Get Ruangan By Lantai ID
    public function getRuanganByLantaiID(M_Ruangan $ruangan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $ruangan->where([
            ["id_lantai", "=", $request->id_lantai]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_RuanganTransformer)
            ->toArray();
    }
    // Get Ruangan By ID
    public function getRuanganByID(M_Ruangan $ruangan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $ruangan->where([
            ["id", "=", $request->id_ruangan]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_RuanganTransformer)
            ->toArray();
    }

    // Get Agama All
    public function getAgamaAll(M_Agama $agama) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $agama->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_AgamaTransformer)
            ->toArray();
    }
    // Get Agama By ID
    public function getAgamaByID(Request $request, M_Agama $agama) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $agama->where([
            ["id", "=", $request->id_agama]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_AgamaTransformer)
            ->toArray();
    }
    
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
