<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class M_Gedung extends Model {
    use Notifiable;
    
    protected $table = "m_gedung";
    protected $fillable = [
        "nama_gedung",
        "singkatan_gedung"
    ];
}
