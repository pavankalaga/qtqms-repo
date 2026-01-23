<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyUrineQcForm extends Model
{
    protected $table = 'daily_urine_qc_forms';

    protected $fillable = [
        'month_year',
        'lot_no',
        'expiry_date',
        'level',
        'instrument_name',
        'instrument_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
