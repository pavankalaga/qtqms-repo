<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureRecord extends Model
{
    use HasFactory;

    protected $table = 'temperature_records';

    protected $fillable = [
        'record_date',
        'morning_temperature',
        'morning_signature',
        'evening_temperature',
        'evening_signature',
    ];

    protected $casts = [
        'morning_temperature' => 'float',
        'evening_temperature' => 'float',
    ];
}
