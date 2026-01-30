<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CytopathologyRequisitionForm extends Model
{
    use HasFactory;

    protected $table = 'cytopathology_requisition_forms';

    protected $fillable = [
        'doc_no',
        'lab_no',
        'date',
        'name',
        'dob',
        'sex',
        'mobile',
        'client_name',
        'client_code',
        'ref_doctor',
        'gynae',
        'non_gynae',
        'clinical_features',
        'sample_site',
        'history',
        'nipple',
        'lmp',
        'fnac',
        'misc',
        'details',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'date' => 'date',
        'dob' => 'date',
        'lmp' => 'date',
        'gynae' => 'array',
        'non_gynae' => 'array',
        'clinical_features' => 'array',
        'sample_site' => 'array',
        'history' => 'array',
        'nipple' => 'array',
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
