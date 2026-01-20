<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalibrationParameterTagging extends Model
{
    use HasFactory;

    protected $table = 'calibration_parameter_tagging';

    protected $fillable = [
        'lab_id',
        'department',
        'calibration_manufacturer',
        'calibration_name',
        'suitable_machine',
        'parameters',
        'is_active',
        'frequency',
        'notes'
    ];

    protected $casts = [
        'parameters' => 'json', // Cast parameters to JSON
    ];
}
