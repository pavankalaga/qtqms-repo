<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class St200MaintenanceForm extends Model
{
    protected $table = 'st200_maintenance_forms';

    protected $fillable = [

        // filters
        'st200_month_year',
        'st200_instrument_id',

        // daily JSON
        'st200_clean_instrument',
        'st200_empty_waste',
        'st200_printer_status',
        'st200_daily_cleaning_solution',
        'st200_calibration',
        'st200_shutdown',
        'st200_lab_staff_sign',
        'st200_lab_supervisor_sign',
    ];

    protected $casts = [

        'st200_clean_instrument'          => 'array',
        'st200_empty_waste'               => 'array',
        'st200_printer_status'            => 'array',
        'st200_daily_cleaning_solution'   => 'array',
        'st200_calibration'               => 'array',
        'st200_shutdown'                  => 'array',
        'st200_lab_staff_sign'             => 'array',
        'st200_lab_supervisor_sign'        => 'array',
    ];
}
