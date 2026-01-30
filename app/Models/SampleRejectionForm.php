<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleRejectionForm extends Model
{
    use HasFactory;

    protected $table = 'sample_rejection_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'location',
        'department',
        'date_time',
        'patient_barcode',
        'parameter',
        'collected_by',
        'sample_type',
        'reason_rejection',
        'informed_by_name',
        'informed_by_sign',
        'informed_to_csd',
        'fresh_sample_yes_no',
        'new_barcode',
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
