<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_StatusPerkawinan extends Model {
    use Notifiable;
    
    protected $table = "m_perkawinan";
    protected $fillable = [
        "status"
    ];
}
