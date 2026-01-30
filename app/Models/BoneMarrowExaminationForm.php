<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoneMarrowExaminationForm extends Model
{
    use HasFactory;

    protected $table = 'bone_marrow_examination_forms';

    protected $fillable = [
        'doc_no',
        'patient_name',
        'lab_number',
        'age_sex',
        'exam_date',
        'ref_doctor',
        'time',
        'client_name',
        'mobile_no',
        'client_code',
        'clinical_history',
        'hemoglobin',
        'rbc_count',
        'mcv',
        'rdw',
        'total_leukocyte_count',
        'differential_leukocyte_count',
        'platelet_count',
        'peripheral_smear_findings',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
