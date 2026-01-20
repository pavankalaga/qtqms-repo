<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleOutsourceRegister extends Model
{
    protected $table = 'sample_outsource_registers';

    protected $fillable = [
        'date',
        'location',
        'department',
        'equipment_id',

        'bar_code',
        'patient_name',
        'testname_code',

        'sample_handover_sign',
        'sample_receiver_sign',

        'sample_handover_to_os',
        'os_lab_receiver_name',
        'destination_department'
    ];

}
