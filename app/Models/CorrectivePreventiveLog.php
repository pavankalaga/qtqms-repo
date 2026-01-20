<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectivePreventiveLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_action',
        'survey_name',
        'sample_details',
        'eqas_sample_run_date',
        'outlier_results',
        'eqas_trends',
        'root_cause_analysis',
        'other_specify',
        'immediate_action_taken',
        're_assayed_results',
        'comment_on_re_assayed_results',
        'preventive_action',
        'documents_attached',
        'conclusion',
        'corrective_action_taken_by',
        'corrective_action_reviewed_by',
        'remark',
    ];

    // Cast JSON columns to arrays
    protected $casts = [
        'root_cause_analysis' => 'array',
        're_assayed_results' => 'array',
    ];
}
