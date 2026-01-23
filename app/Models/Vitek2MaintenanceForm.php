<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vitek2MaintenanceForm extends Model
{
    protected $table = 'vitek2_maintenance_forms';

    protected $fillable = [
        'vitek_month_year',
        'vitek_instrument_id',
        'vitek_daily',
        'vitek_monthly',
    ];

    protected $casts = [
        'vitek_daily'   => 'array',
        'vitek_monthly' => 'array',
    ];
}
