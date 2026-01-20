<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalibrationUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'parameter',
        'date',
        'status',
        'tests',
        'aspiration_qty',
        'aliquoted_qty',
        'utilized_qty',
        'aspiration_quantities',
        'calibration_parameter_tagging_id'
    ];

    protected $casts = [
        'tests' => 'array',
        'date' => 'date'
    ];

    public function lab()
    {
        return $this->belongsTo(Location::class, 'lab_id');
    }
}