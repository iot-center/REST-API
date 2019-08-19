<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Ruangan extends Model {
    use Notifiable;
    
    protected $table = "m_ruangan";
    protected $fillable = [
        "id_lantai",
        "nama_ruangan"
    ];
}
