<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CgCytogeneticsConsent extends Model
{
    protected $fillable = [
        'consent_karyotype',
        'consent_fish',

        'patient_signature',
        'patient_full_name',
        'patient_date',
        'patient_time',

        'obtainer_signature',
        'obtainer_full_name',
        'obtainer_date',
        'obtainer_time',
    ];

    protected $casts = [
        'consent_karyotype' => 'boolean',
        'consent_fish'      => 'boolean',
        'patient_date'      => 'date',
        'obtainer_date'     => 'date',
    ];
}
