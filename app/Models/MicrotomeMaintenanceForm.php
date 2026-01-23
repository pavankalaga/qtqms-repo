<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MicrotomeMaintenanceForm extends Model
{
    protected $table = 'microtome_maintenance_forms';

    protected $fillable = [
        'microtome_month_year',
        'microtome_instrument_id',
        'microtome_daily',
    ];

    protected $casts = [
        'microtome_daily' => 'array',
    ];
}
