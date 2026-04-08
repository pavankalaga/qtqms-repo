<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleOutSourcing extends Model
{
    use HasFactory;

    protected $table = 'sample_outsourcing';

    protected $fillable = [
        'date',
        'barcode',
        'patient_name',
        'department',
        'test_name_code',
        'handover_sign_date_time',
        'receiver_sign_date_time',
        'handover_outsourced_lab',
        'outsourced_receiver_date_time',
        'month_year'
    ];
}
