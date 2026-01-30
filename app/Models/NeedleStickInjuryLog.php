<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedleStickInjuryLog extends Model
{
    use HasFactory;

    protected $table = 'needle_stick_injury_logs';

    protected $fillable = [
        'doc_no',
        'injured_person',
        'exposure_datetime',
        'sequence_of_events',
        'details_of_exposure',
        'counseling_details',
        'source_person_info',
        'preventive_steps',
        'recorded_by',
        'recorded_date',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'exposure_datetime' => 'datetime',
        'recorded_date' => 'date',
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
