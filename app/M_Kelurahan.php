<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Kelurahan extends Model {
    use Notifiable;
    
    protected $table = "m_kelurahan";
    protected $fillable = [
        "id_kecamatan",
        "nama_kelurahan"
    ];
}
