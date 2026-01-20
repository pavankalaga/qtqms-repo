<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioSafetyCabinetForm extends Model
{
    use HasFactory;

    protected $table = 'bio_safety_cabinet_forms';

    /**
     * ===============================
     * MASS ASSIGNABLE FIELDS
     * ===============================
     */
    protected $fillable = [
        'bsc_department',
        'bsc_month_year',
        'bsc_equipment_id',

        'bsc_clean_ipa',
        'bsc_uv_light',
        'bsc_manometer',
        'bsc_done_by',
        'bsc_hypo_available',

        'bsc_settle_plate_date',
        'bsc_settle_yes',
        'bsc_settle_no',
        'bsc_settle_cfu',

        'bsc_uv_efficacy',
        'bsc_checked_by',
        'bsc_remarks',
    ];

    /**
     * ===============================
     * CASTS (IMPORTANT)
     * ===============================
     */
    protected $casts = [
        'bsc_clean_ipa' => 'array',
        'bsc_uv_light' => 'array',
        'bsc_manometer' => 'array',
        'bsc_done_by' => 'array',
        'bsc_hypo_available' => 'array',

        'bsc_settle_plate_date' => 'array',
        'bsc_settle_yes' => 'array',
        'bsc_settle_no' => 'array',
        'bsc_settle_cfu' => 'array',

        'bsc_uv_efficacy' => 'array',
        'bsc_checked_by' => 'array',
        'bsc_remarks' => 'array',
    ];

}
