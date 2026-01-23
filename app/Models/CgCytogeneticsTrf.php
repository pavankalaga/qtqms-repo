<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CgCytogeneticsTrf extends Model
{
    protected $table = 'cg_cytogenetics_trfs';
    protected $fillable = [
        'patient_name',
        'patient_age',
        'patient_gender',
        'patient_address',

        'physician_address',
        'physician_phone',
        'hospital_lab',
        'collection_date',
        'collection_time',
        'specimen_type',

        'sample_received_at',
        'sample_condition',

        'study_requests',
        'study_other_details',

        'prenatal_studies',
        'prenatal_ultrasound_details',
        'prenatal_other_details',

        'pediatric_studies',
        'pediatric_cardiac_details',
        'pediatric_anomalies_details',

        'adult_studies',
        'familial_translocation_details',
        'previous_child_details',
        'adult_other_details',

        'suspected_chromosome',
        'study_indication',
        'additional_conditions',
        'suspected_trisomy',

        'major_birth_defect',
        'multiple_anomalies',
        'parental_followup',
        'other_notes',

        'oncology_diagnosis',
        'new_diagnosis',
        'wbc',
        'blasts_percentage',
        'repeat_study',
        'bone_marrow_transplant',
        'donor_sex',
        'previous_therapy',

        'sample_types',
        'study_categories',
    ];

    protected $casts = [
        'study_requests'        => 'array',
        'prenatal_studies'      => 'array',
        'pediatric_studies'     => 'array',
        'adult_studies'         => 'array',
        'additional_conditions' => 'array',
        'sample_types'          => 'array',
        'study_categories'      => 'array',
        'sample_received_at'    => 'datetime',
    ];
}
