<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QcLog extends Model
{
    use HasFactory;

    protected $table = 'qc_logs'; // Table name

    protected $fillable = [
        'instrument_name',
        'instrument_id',
        'qc_lot_no',
        'month_year',
        'date',
        'positive_control',
        'negative_control',
        'technician_sign',
        'pathologist_sign',
        'remark'
    ];
}
