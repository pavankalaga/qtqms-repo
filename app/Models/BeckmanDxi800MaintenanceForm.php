<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeckmanDxi800MaintenanceForm extends Model
{
    protected $table = 'beckman_dxi800_maintenance_forms';

    protected $fillable = [

        // Filters
        'dxi_month_year',
        'dxi_location',
        'dxi_department',

        // Daily JSON
        'dxi_system_backup',
        'dxi_zone_temperature',
        'dxi_system_supplies',
        'dxi_clean_probe',
        'dxi_solid_waste',
        'dxi_prime_substrate',
        'dxi_daily_cleaning',
        'dxi_performed_by',
        'dxi_reviewed_by',

        // Weekly JSON
        'dxi_week_date',
        'dxi_clean_exterior',
        'dxi_clean_primary_probe',
        'dxi_waste_filter',
        'dxi_system_check',
        'dxi_supervisor_sign',
    ];

    protected $casts = [

        // Daily
        'dxi_system_backup'        => 'array',
        'dxi_zone_temperature'    => 'array',
        'dxi_system_supplies'     => 'array',
        'dxi_clean_probe'         => 'array',
        'dxi_solid_waste'         => 'array',
        'dxi_prime_substrate'     => 'array',
        'dxi_daily_cleaning'      => 'array',
        'dxi_performed_by'        => 'array',
        'dxi_reviewed_by'         => 'array',

        // Weekly
        'dxi_week_date'           => 'array',
        'dxi_clean_exterior'      => 'array',
        'dxi_clean_primary_probe' => 'array',
        'dxi_waste_filter'        => 'array',
        'dxi_system_check'        => 'array',
        'dxi_supervisor_sign'     => 'array',
    ];
}
