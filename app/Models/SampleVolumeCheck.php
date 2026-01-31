<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleVolumeCheck extends Model
{
    protected $table = 'sample_volume_checks';

    protected $fillable = [
        'month_year',
        'location',
        'department',
        'done_by',
        'reviewed_by',
        'containers',
        'doc_no',
        'issue_no',
        'issue_date',
    ];

    protected $casts = [
        'containers' => 'array',
        'issue_date' => 'date',
    ];
}
