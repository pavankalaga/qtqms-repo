<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmendmentReportMonitoringForm extends Model
{
    use HasFactory;

    protected $table = 'amendment_report_monitoring_forms';

    protected $fillable = [
        'doc_no',
        'amendment_date',
        'visit_no',
        'parameter',
        'amendment_reason',
        'amendment_done_by',
        'original_result',
        'final_result_lims',
        'location',
        'department',
        'created_by',
        'updated_by',
    ];

    // protected $casts = [
    //     'amendment_date' => 'date',
    // ];
}
