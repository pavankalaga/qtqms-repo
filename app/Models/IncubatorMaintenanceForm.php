<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncubatorMaintenanceForm extends Model
{
    protected $table = 'incubator_maintenance_forms';

    protected $fillable = [
        'inc_maint_month_year',
        'inc_maint_instrument_id',

        'inc_maint_clean_outside',
        'inc_maint_clean_inside',
        'inc_maint_temperature_check',
        'inc_maint_power_check',
        'inc_maint_lab_staff_sign',
        'inc_maint_lab_supervisor_sign',
    ];

    protected $casts = [
        'inc_maint_clean_outside'        => 'array',
        'inc_maint_clean_inside'         => 'array',
        'inc_maint_temperature_check'    => 'array',
        'inc_maint_power_check'          => 'array',
        'inc_maint_lab_staff_sign'        => 'array',
        'inc_maint_lab_supervisor_sign'   => 'array',
    ];
}
