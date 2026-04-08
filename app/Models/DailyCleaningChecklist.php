<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCleaningChecklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_year',
        'floor_data',
        'dustbins_data',
        'counters_data',

        'equipment_data',
        'staff_signature',
        'supervisor_signature',

    ];

    // Cast JSON columns to arrays
    protected $casts = [
        'floor_data' => 'array',
        'dustbins_data' => 'array',
        'counters_data' => 'array',
        'equipment_data' => 'array',
    ];
}
