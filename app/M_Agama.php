<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_Agama extends Model {
    use Notifiable;
    
    protected $table = "m_agama";
    protected $fillable = [
        "agama"
    ];
}
