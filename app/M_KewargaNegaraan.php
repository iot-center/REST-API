<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_KewargaNegaraan extends Model {
    use Notifiable;
    
    protected $table = "m_kewarga_negaraan";
    protected $fillable = [
        "kewarga_negaraan"
    ];
}
