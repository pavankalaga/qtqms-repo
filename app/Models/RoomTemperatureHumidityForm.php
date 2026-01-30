<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTemperatureHumidityForm extends Model
{
    use HasFactory;

    protected $table = 'room_temperature_humidity_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'department',
        'instrument_id',
        'daily_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'daily_data' => 'array',
    ];
}
