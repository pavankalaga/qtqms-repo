<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoclaveMaintenance extends Model
{
    protected $table = 'autoclave_maintenances';

    protected $fillable = [
        'aut_month_year',
        'aut_instrument_id',

        'aut_clean_outside',
        'aut_chamber_water',
        'aut_clean_inside',
        'aut_power_check',

        'aut_lab_staff_sign',
        'aut_lab_supervisor_sign',
    ];

    protected $casts = [
        'aut_clean_outside'        => 'array',
        'aut_chamber_water'        => 'array',
        'aut_clean_inside'         => 'array',
        'aut_power_check'          => 'array',

        'aut_lab_staff_sign'       => 'array',
        'aut_lab_supervisor_sign'  => 'array',
    ];
}
