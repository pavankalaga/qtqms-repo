<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyIqcOutlierNcpaForm extends Model
{
    use HasFactory;

    protected $table = 'daily_iqc_outlier_ncpa_forms';

    protected $fillable = [
        'doc_no',
        'outlier_date',
        'outlier_parameter',
        'non_conformity',
        'root_cause',
        'corrective_action',
        'preventive_action',
        'closure_date',
        'signature',
        'location',
        'department',
        'created_by',
        'updated_by',
    ];
}
