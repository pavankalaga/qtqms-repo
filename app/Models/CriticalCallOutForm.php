<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticalCallOutForm extends Model
{
    use HasFactory;

    protected $table = 'critical_call_out_forms';

    protected $fillable = [
        'doc_no',
        'call_date',
        'patient_id',
        'test_parameter',
        'initial_value',
        'cross_check_value',
        'reporting_time',
        'informed',
        'readback_value',
        'informing_time',
        'person_sign',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'call_date' => 'date',
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
