<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaminarAirFlowMaintenance extends Model
{
    use HasFactory;

    protected $table = 'laminar_air_flow_maintenances';

    protected $fillable = [
        'laf_department',
        'laf_month_year',
        'laf_equipment_id',

        'laf_clean_ipa',
        'laf_uv_light',
        'laf_manometer',
        'laf_done_by',
        'laf_hypo_available',
        'laf_settle_plate_date',
        'laf_settle_result',
        'laf_uv_efficacy',
        'laf_checked_by',
        'laf_remarks',
    ];

    protected $casts = [
        'laf_clean_ipa'          => 'array',
        'laf_uv_light'           => 'array',
        'laf_manometer'          => 'array',
        'laf_done_by'            => 'array',
        'laf_hypo_available'     => 'array',
        'laf_settle_plate_date'  => 'array',
        'laf_settle_result'      => 'array',
        'laf_uv_efficacy'        => 'array',
        'laf_checked_by'         => 'array',
        'laf_remarks'            => 'array',
    ];
}
