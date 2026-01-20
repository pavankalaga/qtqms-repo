<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticalCallMonitoringLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_year',
        'date',
        'patient_id',
        'test_parameter',
        'initial_value',
        'cross_check_value',
        'reporting_time',
        'concern_clinician_patient_informed',
        'readback_value',
        'time_of_informing',
        'signature_of_person_informing',
    ];
}
