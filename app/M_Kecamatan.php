<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Kecamatan extends Model {
    use Notifiable;
    
    protected $table = "m_kecamatan";
    protected $fillable = [
        "id_kota",
        "nama_kecamatan"
    ];
}
