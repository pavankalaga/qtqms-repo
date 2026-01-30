<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EqasCapaOutlierForm extends Model
{
    use HasFactory;

    protected $table = 'eqas_capa_outlier_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'department',
        'location',
        'corrective_action_date',
        'survey_name',
        'sample_details',
        'sample_run_date',
        'outlier_results',
        'eqas_trends',
        'root_cause_summary',
        'root_cause_checklist',
        'other_root_cause',
        'immediate_action',
        'reassay_results',
        'reassay_comment',
        'preventive_action',
        'conclusion',
        'action_taken_by',
        'action_approved_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'root_cause_checklist' => 'array',
        'reassay_results' => 'array',
    ];
}
