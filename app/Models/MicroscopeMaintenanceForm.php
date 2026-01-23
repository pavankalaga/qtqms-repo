<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MicroscopeMaintenanceForm extends Model
{
    protected $table = 'microscope_maintenance_forms';

    protected $fillable = [
        'mic_month_year',
        'mic_instrument_id',
        'mic_daily',
    ];

    protected $casts = [
        'mic_daily' => 'array',
    ];
}
