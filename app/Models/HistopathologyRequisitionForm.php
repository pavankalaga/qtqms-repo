<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistopathologyRequisitionForm extends Model
{
    use HasFactory;

    protected $table = 'histopathology_requisition_forms';

    protected $fillable = [
        'doc_no',
        'sin_no',
        'patient_name',
        'dob',
        'sex',
        'mobile',
        'client_name',
        'client_code',
        'ref_doctor',
        'ref_date',
        'specimen_site',
        'clinical_history',
        'additional_data',
        'clinical_diagnosis',
        'specimen_large',
        'specimen_medium',
        'specimen_small',
        'specimen_misc',
        'ihc_markers',
        'special_stains',
        'fixation',
        'type_selected',
        'test_code_small',
        'test_code_medium',
        'test_code_large',
        'test_code_complex',
        'small_other',
        'medium_other',
        'large_other',
        'complex_other',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'ref_date' => 'date',
        'specimen_large' => 'boolean',
        'specimen_medium' => 'boolean',
        'specimen_small' => 'boolean',
        'type_selected' => 'array',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
