<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HakAksesGuest extends Model {
    use Notifiable;
    
    protected $table = "hak_akses_guest";
    protected $fillable = [
        "id_user",
        "id_hak_akses"
    ];
}
