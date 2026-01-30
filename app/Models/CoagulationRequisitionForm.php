<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoagulationRequisitionForm extends Model
{
    use HasFactory;

    protected $table = 'coagulation_requisition_forms';

    protected $fillable = [
        'doc_no',
        'lab_no',
        'form_date',
        'specimen_type',
        'specimen_time',
        'patient_name',
        'age',
        'sex',
        'tel_patient',
        'tel_physician',
        'clinical_0',
        'clinical_1',
        'clinical_2',
        'clinical_3',
        'clinical_4',
        'clinical_5',
        'clinical_6',
        'last_transfusion_date',
        'transfusion_type',
        'lab_0',
        'lab_0_value',
        'lab_1',
        'lab_1_value',
        'liver_function',
        'liver_function_note',
        'others_specify',
        'current_dose',
        'dose_change_date',
        'drug_0',
        'drug_0_notes',
        'drug_1',
        'drug_1_notes',
        'drug_2',
        'drug_2_notes',
        'drug_3',
        'drug_3_notes',
        'heparin_0',
        'heparin_0_notes',
        'heparin_1',
        'heparin_1_notes',
        'major_surgery',
        'probable_diagnosis',
        'sample_collected_by',
        'client_name_code',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'form_date' => 'date',
        'last_transfusion_date' => 'date',
        'dose_change_date' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
