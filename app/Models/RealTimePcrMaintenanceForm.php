<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealTimePcrMaintenanceForm extends Model
{
    protected $table = 'real_time_pcr_maintenance_forms';

    protected $fillable = [
        'rtpcr_month_year',
        'rtpcr_instrument_id',
        'rtpcr_daily',
    ];

    protected $casts = [
        'rtpcr_daily' => 'array',
    ];
}
