<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataDevice extends Model {
    use Notifiable;

    protected $table = "data_device";
    protected $fillable = [
        "id_device",
        "Va",
        "Vb",
        "Vc",
        "Vab",
        "Vbc",
        "Vca",
        "Ia",
        "Ib",
        "Ic",
        "Pa",
        "Pb",
        "Pc",
        "Qa",
        "Qb",
        "Qc",
        "Sa",
        "Sb",
        "Sc",
        "PFa",
        "PFb",
        "PFc",
        "Freq",
        "TAE"
    ];
}
