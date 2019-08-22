<?php

namespace App\Http\Controllers;

use App\Transformations\UserTransformer;
use Illuminate\Http\Request;
use App\User;

class API_AdminUser extends Controller {
    
    // Create User Guest
    public function createUserGuest(Request $request, User $user) {
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
            "password"          => "required|min:8"
        ]);

        $data = $user->create([
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
            "id_level"              => 3,
            "api_token"             => Hash::make($request->email)
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new UserTransformer)
            ->toArray(), 200);
    }

}
