<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaternalMarkerTrf extends Model
{
    use HasFactory;

    protected $table = 'maternal_marker_trfs';

    protected $fillable = [
        'filter_patient_mobile',

        'physician_name',
        'physician_mobile',
        'client_name',
        'client_code',

        'test_panels',

        'patient_name',
        'patient_age',
        'patient_dob',
        'patient_mobile',
        'patient_email',

        'patient_weight',
        'ethnicity',
        'lmp',

        'diabetic_status',
        'chronic_hypertension',

        'on_medication',
        'medication_details',

        'smoking_status',

        'bp_date',
        'bp_right',
        'bp_left',

        'sample_collection_date',
        'sample_collection_time',
        'ultrasound_date',

        'crl_a', 'crl_b',
        'nt_a', 'nt_b',
        'nb_a', 'nb_b',
        'bpd_a', 'bpd_b',

        'uterine_left',
        'uterine_right',

        'donor_age',
        'donor_dob',
        'ivf_type',

        'extraction_date',
        'transfer_date',
        'hcg_taken',
        'hcg_date',

        'patient_signature',
        'patient_signature_date',
    ];

    protected $casts = [
        'test_panels' => 'array',
        'patient_dob' => 'date',
        'lmp' => 'date',
        'bp_date' => 'date',
        'sample_collection_date' => 'date',
        'ultrasound_date' => 'date',
        'donor_dob' => 'date',
        'extraction_date' => 'date',
        'transfer_date' => 'date',
        'hcg_date' => 'date',
        'patient_signature_date' => 'date',
    ];
}
