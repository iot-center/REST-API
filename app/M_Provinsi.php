<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Provinsi extends Model {
    use Notifiable;
    
    protected $table = "m_provinsi";
    protected $fillable = [
        "nama_provinsi"
    ];
}
