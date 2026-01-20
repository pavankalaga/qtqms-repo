<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotAirOvenMaintenance extends Model
{
    protected $table = 'hot_air_oven_maintenances';

    protected $fillable = [
        'hao_maint_month_year',
        'hao_maint_instrument_id',

        'hao_maint_clean_outside',
        'hao_maint_clean_inside',
        'hao_maint_temperature_check',
        'hao_maint_power_check',

        'hao_maint_lab_staff_sign',
        'hao_maint_lab_supervisor_sign',
    ];

    protected $casts = [
        'hao_maint_clean_outside'        => 'array',
        'hao_maint_clean_inside'         => 'array',
        'hao_maint_temperature_check'    => 'array',
        'hao_maint_power_check'          => 'array',

        'hao_maint_lab_staff_sign'       => 'array',
        'hao_maint_lab_supervisor_sign'  => 'array',
    ];
}
