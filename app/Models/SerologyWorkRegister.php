<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerologyWorkRegister extends Model
{
    protected $table = 'serology_work_registers';

    protected $fillable = [
        'form_date',
        'barcode',
        'patient_name',
        'age_gender',
        'investigation',
        'sample_type',
        'sample_received',
        'sample_received_by',
        'processing_datetime',
        'processed_by',
        'observations',
        'hod_signature',
    ];

    // protected $casts = [
    //     'form_date'           => 'date:Y-m-d',
    //     'sample_received'     => 'datetime:Y-m-d\TH:i',
    //     'processing_datetime' => 'datetime:Y-m-d\TH:i',
    // ];
}
