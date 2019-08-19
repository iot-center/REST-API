<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Lantai extends Model {
    use Notifiable;
    
    protected $table = "m_lantai";
    protected $fillable = [
        "id_gedung",
        "nama_lantai"
    ];
}
