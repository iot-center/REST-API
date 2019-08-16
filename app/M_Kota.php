<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Kota extends Model {
    use Notifiable;
    
    protected $table = "m_kota";
    protected $fillable = [
        "id_provinsi",
        "nama_kota"
    ];
}
