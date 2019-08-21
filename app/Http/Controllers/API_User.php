<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class API_User extends Controller {
    // Get Profile
    public function getProfile(User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $user->where([
            ["id", "=", Auth::user()->id]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }

    // Update Profile
    public function updateProfile(Request $request, User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "nik"               => "required|unique:users|min:16|numeric",
            "nama"              => "required",
            "tempat_lahir"      => "required",
            "tgl_lahir"         => "required",
            "jenis_kelamin"     => "required|numeric",
            "gol_darah"         => "required",
            "alamat"            => "required",
            "rt"                => "required",
            "rw"                => "required",
            "provinsi"          => "required|numeric",
            "kota"              => "required|numeric",
            "kecamatan"         => "required|numeric",
            "kelurahan"         => "required|numeric",
            "agama"             => "required|numeric",
            "status_kawin"      => "required|numeric",
            "kewarga_negaraan"  => "required|numeric",
            "username"          => "required|unique:users",
            "email"             => "required|email:rfc,dns|unique:users",
            "no_hp"             => "required|numeric|min:10",
            "password"          => "required|min:8",
            "level"             => "required|numeric"
        ]);

        $status = $user->where([
            ["id", "=", Auth::user()->id]
        ])->update([
            "nik"               => $request->nik,
            "nama"              => $request->nama,
            "tempat_lahir"      => $request->tempat_lahir,
            "tgl_lahir"         => $request->tgl_lahir,
            "jenis_kelamin"     => $request->jenis_kelamin,
            "gol_darah"         => $request->gol_darah,
            "alamat"            => $request->alamat,
            "rt"                => $request->rt,
            "rw"                => $request->rw,
            "id_provinsi"       => $request->provinsi,
            "id_kota"           => $request->kota,
            "id_kecamatan"      => $request->kecamatan,
            "id_kelurahan"      => $request->kelurahan,
            "id_agama"          => $request->agama,
            "id_status_perkawinan"  => $request->status_kawin,
            "id_kewarga_negaraan"   => $request->kewarga_negaraan,
            "username"              => $request->username,
            "email"                 => $request->email,
            "no_hp"                 => $request->no_hp,
            "password"              => Hash::make($request->password),
            "id_level"              => $request->level,
            "api_token"             => Hash::make($request->email)
        ]);

        if ($status) {
            $data = $user->where([
                ["id", "=", Auth::user()->id]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }
    
    // Get All User
    public function getAll(User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $user->all();

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }

    // Get All User By Level
    public function getAllByLevel(Request $request, User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $user->where([
            ["id_level", "=", $request->id_level]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }

    // Get Detail User
    public function getDetail(Request $request, User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $user->where([
            ["id", "=", $request->id_user]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }

    // Deactive User
    public function deactive(Request $request, User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $status = $user->where([
            ["id", "=", $request->id_user]
        ])->update([
            "id_level"  => 4
        ]);

        if ($status) {
            $data = $level->where([
                ["id", "=", $request->id_user]
            ])->get();
        }
        else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }

    // Edit User
    public function update(Request $request, User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "nik"               => "required|unique:users|min:16|numeric",
            "nama"              => "required",
            "tempat_lahir"      => "required",
            "tgl_lahir"         => "required",
            "jenis_kelamin"     => "required|numeric",
            "gol_darah"         => "required",
            "alamat"            => "required",
            "rt"                => "required",
            "rw"                => "required",
            "provinsi"          => "required|numeric",
            "kota"              => "required|numeric",
            "kecamatan"         => "required|numeric",
            "kelurahan"         => "required|numeric",
            "agama"             => "required|numeric",
            "status_kawin"      => "required|numeric",
            "kewarga_negaraan"  => "required|numeric",
            "username"          => "required|unique:users",
            "email"             => "required|email:rfc,dns|unique:users",
            "no_hp"             => "required|numeric|min:10",
            "password"          => "required|min:8",
            "level"             => "required|numeric"
        ]);

        $status = $user->where([
            ["id", "=", $request->id_user]
        ])->update([
            "nik"               => $request->nik,
            "nama"              => $request->nama,
            "tempat_lahir"      => $request->tempat_lahir,
            "tgl_lahir"         => $request->tgl_lahir,
            "jenis_kelamin"     => $request->jenis_kelamin,
            "gol_darah"         => $request->gol_darah,
            "alamat"            => $request->alamat,
            "rt"                => $request->rt,
            "rw"                => $request->rw,
            "id_provinsi"       => $request->provinsi,
            "id_kota"           => $request->kota,
            "id_kecamatan"      => $request->kecamatan,
            "id_kelurahan"      => $request->kelurahan,
            "id_agama"          => $request->agama,
            "id_status_perkawinan"  => $request->status_kawin,
            "id_kewarga_negaraan"   => $request->kewarga_negaraan,
            "username"              => $request->username,
            "email"                 => $request->email,
            "no_hp"                 => $request->no_hp,
            "password"              => Hash::make($request->password),
            "id_level"              => $request->level,
            "api_token"             => Hash::make($request->email)
        ]);

        if ($status) {
            $data = $user->where([
                ["id", "=", $request->id_user]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }

    // Delete User
    public function delete(Request $request, User $user) {
        // This is check the authentication is already or not
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $user->where([
            ["id", "=", $request->id_user]
        ])->get();

        $status = $user->where([
            ["id", "=", $request->id_user]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return fractal()
            ->collection($data)
            ->transformWith(new User)
            ->toArray();
    }
}
