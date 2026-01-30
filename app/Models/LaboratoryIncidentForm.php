<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryIncidentForm extends Model
{
    use HasFactory;

    protected $table = 'laboratory_incident_forms';

    protected $fillable = [
        'doc_no',
        'incident_date_patient_id',
        'report_filed_by',
        'complaint_identification',
        'department_involved',
        'incident_description',
        'damage_description',
        'root_cause_description',
        'corrective_action',
        'management_decision',
        'signature_quality_manager',
        'signature_lab_head',
        'created_by',
        'updated_by',
    ];
}
