<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotPlateQcForm extends Model
{
    protected $table = 'hot_plate_qc_forms';

    protected $fillable = [
        'month_year',
        'instrument_serial_no',
        'cleaning_outside',
        'temperature_check',
        'lab_staff_signature',
        'lab_supervisor_signature',
        'form_id',
        'doc_no',
        'issue_no',
        'issue_date',
    ];

    protected $casts = [
 //       'month_year' => 'date',
        'cleaning_outside' => 'array',
        'temperature_check' => 'array',
        'lab_staff_signature' => 'array',
        'lab_supervisor_signature' => 'array',
        'issue_date' => 'date',
    ];
}
