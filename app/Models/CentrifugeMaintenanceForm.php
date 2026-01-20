<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentrifugeMaintenanceForm extends Model
{
    protected $table = 'centrifuge_maintenance_forms';

    protected $fillable = [
        'cen_month_year',
        'cen_instrument_id',

        'cen_clean_outside',
        'cen_clean_inside',
        'cen_power_check',
        'cen_carbon_brush',
        'cen_lab_staff_sign',
        'cen_lab_supervisor_sign',

        'cen_week1_date',
        'cen_week2_date',
        'cen_week3_date',
        'cen_week4_date',

        'cen_week1_staff',
        'cen_week2_staff',
        'cen_week3_staff',
        'cen_week4_staff',

        'cen_week1_supervisor',
        'cen_week2_supervisor',
        'cen_week3_supervisor',
        'cen_week4_supervisor',
    ];

    protected $casts = [
        'cen_clean_outside'      => 'array',
        'cen_clean_inside'       => 'array',
        'cen_power_check'        => 'array',
        'cen_carbon_brush'       => 'array',
        'cen_lab_staff_sign'     => 'array',
        'cen_lab_supervisor_sign'=> 'array',
    ];
}
