<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "nik",
        "nama",
        "tempat_lahir",
        "tgl_lahir",
        "jenis_kelamin",
        "gol_darah",
        "alamat",
        "rt",
        "rw",
        "id_provinsi",
        "id_kota",
        "id_kelurahan",
        "id_kecamatan",
        "id_agama",
        "id_status_perkawinan",
        "id_kewarga_negaraan",
        "username",
        "email",
        "no_hp",
        "password",
        "id_level",
        "api_token"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'nik', 'password', 'remember_token'
    ];
}
