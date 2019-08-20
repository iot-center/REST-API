<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Device extends Model {
    use Notifiable;
    
    protected $table = "m_device";
    protected $fillable = [
        "id_gedung",
        "id_lantai",
        "id_ruangan",
        "uri"
    ];
}
