<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FnacConsentForm extends Model
{
    use HasFactory;

    protected $table = 'fnac_consent_forms';

    protected $fillable = [
        'doc_no',
        'consent_name',
        'test_area',
        'patient_name',
        'doctor_name',
        'patient_signature',
        'doctor_signature',
        'date',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'date' => 'date',
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
