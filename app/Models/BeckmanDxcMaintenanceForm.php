<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeckmanDxcMaintenanceForm extends Model
{
    protected $table = 'beckman_dxc_maintenance_forms';

    protected $fillable = [

        // ===== FILTERS =====
        'dxc_month_year',
        'dxc_location',
        'dxc_department',

        // ===== DAILY (JSON: day => value) =====
        'dxc_inspect_syringes',
        'dxc_inspect_roller_pump',
        'dxc_inspect_probes',
        'dxc_replace_diluent',
        'dxc_replace_probe_wash',
        'dxc_clean_ise',
        'dxc_calibrate_ise',
        'dxc_performed_by',
        'dxc_reviewed_by',

        // ===== WEEKLY (JSON: week => value) =====
        'dxc_week_date',
        'dxc_clean_probe_mix',
        'dxc_perform_w2',
        'dxc_performed_supervisor',
    ];

    protected $casts = [

        // ===== DAILY JSON =====
        'dxc_inspect_syringes'       => 'array',
        'dxc_inspect_roller_pump'   => 'array',
        'dxc_inspect_probes'        => 'array',
        'dxc_replace_diluent'       => 'array',
        'dxc_replace_probe_wash'    => 'array',
        'dxc_clean_ise'             => 'array',
        'dxc_calibrate_ise'         => 'array',
        'dxc_performed_by'          => 'array',
        'dxc_reviewed_by'           => 'array',

        // ===== WEEKLY JSON =====
        'dxc_week_date'             => 'array',
        'dxc_clean_probe_mix'       => 'array',
        'dxc_perform_w2'            => 'array',
        'dxc_performed_supervisor'  => 'array',
    ];
}
