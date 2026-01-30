<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentReportingForm extends Model
{
    use HasFactory;

    protected $table = 'accident_reporting_forms';

    protected $fillable = [
        'doc_no',
        'location',
        'date_time',
        'person_involved',
        'injuries_sustained',
        'emergency_first_aid',
        'first_aid_by',
        'follow_up_action',
        'preventive_action',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'date_time' => 'datetime',
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
