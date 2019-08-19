<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_HakAksesGuest extends Model {
    use Notifiable;
    
    protected $table = "m_hak_akses_guest";
    protected $fillable = [
        "id_gedung",
        "id_lantai",
        "id_ruangan"
    ];
}
