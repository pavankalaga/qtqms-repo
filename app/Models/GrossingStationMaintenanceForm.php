<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrossingStationMaintenanceForm extends Model
{
    protected $table = 'grossing_station_maintenance_forms';

    protected $fillable = [
        'gs_month_year',
        'gs_instrument_id',
        'gs_daily',
    ];

    protected $casts = [
        'gs_daily' => 'array',
    ];
}
