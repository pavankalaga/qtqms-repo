<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HpClinicalCorrelationRegister extends Model
{
    use HasFactory;

    protected $table = 'hp_clinical_correlation_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'sin_no',
        'patient_name',
        'age_sex',
        'clinical_history',
        'site',
        'hp_impression',
        'cyto_impression',
        'correlation',
        'remarks',
        'hod_sign',
        'created_by',
        'updated_by',
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
