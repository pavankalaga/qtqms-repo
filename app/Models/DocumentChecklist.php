<?php

// app/Models/DocumentChecklist.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentChecklist extends Model
{
    protected $fillable = [
        // 'month_year',
        // 'title_section',
        // 'scope_purpose_section',
        // 'development_process_section',
        // 'evidence_base_section',
        // 'approval_section',
        // 'dissemination_section',
        // 'monitoring_section',
        // 'review_date_section',
        // 'responsibility_section',
        // 'equality_impact_section',
        // 'approval_details'

        'month_year',
        'checklist_data',
        'approval_data'

    ];

    protected $casts = [
        // 'month_year' => 'date:Y-m-d',
        // 'title_section' => 'array',
        // 'scope_purpose_section' => 'array',
        // 'development_process_section' => 'array',
        // 'evidence_base_section' => 'array',
        // 'approval_section' => 'array',
        // 'dissemination_section' => 'array',
        // 'monitoring_section' => 'array',
        // 'review_date_section' => 'array',
        // 'responsibility_section' => 'array',
        // 'equality_impact_section' => 'array',
        // 'approval_details' => 'array'


        'checklist_data' => 'array',
        'approval_data' => 'array',
        'month_year' => 'date:Y-m-d'

    ];
}
