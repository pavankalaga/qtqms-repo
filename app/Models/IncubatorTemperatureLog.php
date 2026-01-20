<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncubatorTemperatureLog extends Model
{
    protected $table = 'incubator_temperature_logs';

    protected $fillable = [
        'inc_month_year',
        'inc_instrument_id',
        'inc_morning_temp',
        'inc_morning_sign',
        'inc_evening_temp',
        'inc_evening_sign',
    ];

    protected $casts = [
        'inc_morning_temp' => 'array',
        'inc_morning_sign' => 'array',
        'inc_evening_temp' => 'array',
        'inc_evening_sign' => 'array',
    ];
}
