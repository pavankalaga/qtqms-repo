<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleReceivingRegister extends Model
{
    protected $table = 'sample_receiving_registers';

    protected $fillable = [
        // Filters
        'date',
        'time',
        'location',
        'department',
        'equipment_id',

        // Client
        'client_location',
        'client_name',

        // Samples
        'blood_samples',
        'other_samples',

        // CSR
        'csr_name',
        'csr_sign',

        // Others
        'sample_temp',
        'receiver_name',
        'remarks',
        'tl_code'
    ];
}
