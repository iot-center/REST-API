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
use App\DataDevice;
use Auth;
use Hash;

class API_SuperAdmin extends Controller {

    // Create Ruangan
    public function createRuangan(Request $request, M_Ruangan $ruangan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_lantai"      => 'required',
            "nama_ruangan"     => 'required'
        ]);

        $data = $ruangan->create([
            "id_lantai" => $request->id_lantai,
            "nama_ruangan" => $request->nama_ruangan,
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Ruangan)
            ->toArray(), 200);

    }
    // Update Ruangan
    public function updateRuangan(Request $request, M_Ruangan $ruangan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_ruangan"   => 'required',
            "id_lantai"      => 'required',
            "nama_ruangan"     => 'required'
        ]);

        $status = $ruangan->where([
            ["id", "=", $request->id_ruangan]
        ])->update([
            "id_lantai"     => $request->id_lantai,
            "nama_ruangan"  => $request->nama_ruangan
        ]);

        if ($status) {
            $data = $ruangan->where([
                ["id", "=", $request->id_ruangan]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Ruangan)
            ->toArray(), 200);
        
    }
    // Delete Ruangan
    public function deleteRuangan(Request $request, M_Ruangan $ruangan) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $ruangan->where([
            ["id", "=", $request->id_ruangan]
        ])->get();

        $status = $ruangan->where([
            ["id", "=", $request->id_ruangan]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Ruangan)
            ->toArray(), 200);
        
    }

    // Create Lantai
    public function createLantai(Request $request, M_Lantai $lantai) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_gedung"      => 'required',
            "nama_lantai"     => 'required'
        ]);

        $data = $lantai->create([
            "id_gedung" => $request->id_gedung,
            "nama_lantai" => $request->nama_lantai,
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Lantai)
            ->toArray(), 200);
        
    }
    // Update Lantai
    public function updateLantai(Request $request, M_Lantai $lantai) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_lantai"   => 'required',
            "id_gedung"      => 'required',
            "nama_lantai"     => 'required',
        ]);

        $status = $lantai->where([
            ["id", "=", $request->id_lantai]
        ])->update([
            "id_gedung"     => $request->id_gedung,
            "nama_lantai"     => $request->id_lantai,
        ]);

        if ($status) {
            $data = $lantai->where([
                ["id", "=", $request->id_lantai]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Lantai)
            ->toArray(), 200);
        
    }
    // Delete Lantai
    public function deleteLantai(Request $request, M_Lantai $lantai) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $lantai->where([
            ["id", "=", $request->id_lantai]
        ])->get();

        $status = $lantai->where([
            ["id", "=", $request->id_lantai]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Lantai)
            ->toArray(), 200);
        
    }

    // Create Gedung
    public function createGedung(Request $request, M_Gedung $gedung) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "nama_gedung"      => 'required',
            "singkatan_gedung"     => 'required'
        ]);

        $data = $gedung->create([
            "nama_gedung" => $request->nama_gedung,
            "singkatan_gedung" => $request->singkatan_gedung,
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Gedung)
            ->toArray(), 200);
        
    }
    // Update Gedung
    public function updateGedung(Request $request, M_Gedung $gedung) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_gedung"   => 'required',
            "nama_gedung"      => 'required',
            "singkatan_gedung"     => 'required'
        ]);

        $status = $gedung->where([
            ["id", "=", $request->id_gedung]
        ])->update([
            "nama_gedung"     => $request->nama_gedung,
            "singkatan_gedung"    => $request->singkatan_gedung
        ]);

        if ($status) {
            $data = $gedung->where([
                ["id", "=", $request->id_gedung]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Gedung)
            ->toArray(), 200);
        
    }
    // Delete Gedung
    public function deleteGedung(Request $request, M_Gedung $gedung) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $gedung->where([
            ["id", "=", $request->id_gedung]
        ])->get();

        $status = $gedung->where([
            ["id", "=", $request->id_gedung]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Gedung)
            ->toArray(), 200);
        
    }

    // Create Data Device
    public function createDataDevice(Request $request, DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_device"      => 'required',
            "Va"    => 'required',
            "Vb"    => 'required',
            "Vc"    => 'required',
            "Vab"   => 'required',
            "Vbc"   => 'required',
            "Vca"   => 'required',
            "Ia"    => 'required',
            "Ib"    => 'required',
            "Ic"    => 'required',
            "Pa"    => 'required',
            "Pb"    => 'required',
            "Pc"    => 'required',
            "Qa"    => 'required',
            "Qb"    => 'required',
            "Qc"    => 'required',
            "Sa"    => 'required',
            "Sb"    => 'required',
            "Sc"    => 'required',
            "PFa"    => 'required',
            "PFb"    => 'required',
            "PFc"    => 'required',
            "Freq"    => 'required',
            "TAE"    => 'required'
        ]);

        $data = $data_device->create([
            "id_device"      => $request->id_device,
            "Va"    => $request->Va,
            "Vb"    => $request->Vb,
            "Vc"    => $request->Vc,
            "Vab"   => $request->Vab,
            "Vbc"   => $request->Vbc,
            "Vca"   => $request->Vca,
            "Ia"    => $request->Ia,
            "Ib"    => $request->Ib,
            "Ic"    => $request->Ic,
            "Pa"    => $request->Pa,
            "Pb"    => $request->Pb,
            "Pc"    => $request->Pc,
            "Qa"    => $request->Qa,
            "Qb"    => $request->Qb,
            "Qc"    => $request->Qc,
            "Sa"    => $request->Sa,
            "Sb"    => $request->Sb,
            "Sc"    => $request->Sc,
            "PFa"    => $request->PFa,
            "PFb"    => $request->PFb,
            "PFc"    => $request->PFc,
            "Freq"    => $request->Freq,
            "TAE"    => $request->TAE
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new DataDeviceTransformer)
            ->toArray(), 200);
        
    }
    // Update Data Device
    public function updateDataDevice(Request $request, DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }
        
    }
    // Delete Data Device
    public function deleteDataDevice(Request $request, DataDevice $data_device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }
        
    }

    // Create Device
    public function createDevice(Request $request, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_gedung"      => 'required',
            "id_lantai"     => 'required',
            "id_ruangan"    => 'required'
        ]);

        $data = $device->create([
            "id_gedung" => $request->id_gedung,
            "id_lantai" => $request->id_lantai,
            "id_ruangan"    => $request->id_ruangan
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_Device)
            ->toArray(), 200);
        
    }
    // Update Device
    public function updateDevice(Request $request, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_device"   => 'required',
            "id_gedung"      => 'required',
            "id_lantai"     => 'required',
            "id_ruangan"    => 'required'
        ]);

        $status = $device->where([
            ["id", "=", $request->id_device]
        ])->update([
            "id_gedung"     => $request->id_gedung,
            "id_lantai"     => $request->id_lantai,
            "id_ruangan"    => $request->id_ruangan
        ]);

        if ($status) {
            $data = $device->where([
                ["id", "=", $request->id_device]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Device)
            ->toArray(), 200);
        
    }
    // Delete Device
    public function deleteDevice(Request $request, M_Device $device) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $device->where([
            ["id", "=", $request->id_device]
        ])->get();

        $status = $device->where([
            ["id", "=", $request->id_device]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_Device)
            ->toArray(), 200);
        
    }

    // Create Master Hak Akses User
    public function createMasterHakAkses(Request $request, M_HakAksesGuest $hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_gedung"      => 'required',
            "id_lantai"     => 'required',
            "id_ruangan"    => 'required'
        ]);

        $data = $hak_akses->create([
            "id_gedung" => $request->id_gedung,
            "id_lantai" => $request->id_lantai,
            "id_ruangan"    => $request->id_ruangan
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray(), 200);
        
    }
    // Update Master Hak Akses User
    public function updateMasterHakAkses(Request $request, M_HakAksesGuest $hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_hak_akses"   => 'required',
            "id_gedung"      => 'required',
            "id_lantai"     => 'required',
            "id_ruangan"    => 'required'
        ]);

        $status = $hak_akses->where([
            ["id", "=", $request->id_hak_akses]
        ])->update([
            "id_gedung"     => $request->id_gedung,
            "id_lantai"     => $request->id_lantai,
            "id_ruangan"    => $request->id_ruangan
        ]);

        if ($status) {
            $data = $hak_akses->where([
                ["id", "=", $request->id_hak_akses]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray(), 200);
        
    }
    // Delete Master Hak Akses User
    public function deleteMasterHakAkses(Request $request, M_HakAksesGuest $hak_akses) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $hak_akses->where([
            ["id", "=", $request->id_hak_akses]
        ])->get();

        $status = $hak_akses->where([
            ["id", "=", $request->id_hak_akses]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_HakAksesGuestTransformer)
            ->toArray(), 200);
        
    }

    // Create Agama
    public function createAgama(Request $request, M_Agama $agama) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "agama"      => 'required',
        ]);

        $data = $agama->create([
            "agama" => $request->agama
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_AgamaTransformer)
            ->toArray(), 200);
    }
    // Update Agama
    public function updateAgama(Request $request, M_Agama $agama) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_agama"   => 'required',
            "agama"      => 'required',
        ]);

        $status = $agama->where([
            ["id", "=", $request->id_agama]
        ])->update([
            "agama"     => $request->agama
        ]);

        if ($status) {
            $data = $agama->where([
                ["id", "=", $request->id_agama]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_AgamaTransformer)
            ->toArray(), 200);
    }
    // Delete Agama
    public function deleteAgama(Request $request, M_Agama $agama) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $agama->where([
            ["id", "=", $request->id_agama]
        ])->get();

        $status = $agama->where([
            ["id", "=", $request->id_agama]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_AgamaTransformer)
            ->toArray(), 200);
    }

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
            ["id", "=", $request->id_level]
        ])->get();

        $status = $level->where([
            ["id", "=", $request->id_level]
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

        $status = $level->where([
            ["id", "=", $request->id_level]
        ])->update([
            "level"     => $request->level
        ]);

        if ($status) {
            $data = $level->where([
                ["id", "=", $request->id_level]
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
