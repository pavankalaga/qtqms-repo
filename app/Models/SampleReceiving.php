<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleReceiving extends Model
{
    use HasFactory;
    protected $table = 'sample_receiving';

    protected $fillable = [
        'time',
        'client_location',
        'client_name',
        'date',
        'tl_code',
        'blood',
        'covid',

        'csr_name',
        'csr_sign',
        'sample_temp',
        'sample_temp',
        'receiver_name',
        'remark',
        'month_year'
    ];


}
