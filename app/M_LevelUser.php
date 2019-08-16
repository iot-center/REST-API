<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class M_LevelUser extends Model {
    use Notifiable;
    
    protected $table = "m_level_users";
    protected $fillable = [
        "level"
    ];
}
