<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotAirOvenTemperatureLog extends Model
{
    protected $table = 'hot_air_oven_temperature_logs';

    protected $fillable = [
        'hao_month_year',
        'hao_instrument_id',
        'hao_morning_temp',
        'hao_morning_sign',
        'hao_evening_temp',
        'hao_evening_sign',
    ];

    protected $casts = [
        'hao_morning_temp' => 'array',
        'hao_morning_sign' => 'array',
        'hao_evening_temp' => 'array',
        'hao_evening_sign' => 'array',
    ];
}
