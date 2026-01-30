<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyteCalibrationForm extends Model
{
    use HasFactory;

    protected $table = 'analyte_calibration_forms';

    protected $fillable = [
        'doc_no',
        'location',
        'department',
        'calibration_date',
        'parameters',
        'calibrator_used',
        'lot_no',
        'level1',
        'level1_status',
        'level2',
        'level2_status',
        'level3',
        'level3_status',
        'lab_staff_sign',
        'supervisor_sign',
        'created_by',
        'updated_by',
    ];



    /**
     * Get the user who created this record.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this record.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
