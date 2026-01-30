<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRequisitionForm extends Model
{
    use HasFactory;

    protected $table = 'test_requisition_forms';

    protected $fillable = [
        'doc_no',
        'requisition_date',
        'client_name',
        'client_code',
        'patient_name',
        'mobile_no',
        'email_id',
        'date_of_birth',
        'age_years',
        'age_months',
        'age_days',
        'gender',
        'referring_doctor',
        'address_contact',
        'sample_drawn_date',
        'sample_drawn_time',
        'sample_drawn_ampm',
        'lmp_date',
        'sample_shipment_date',
        'no_of_containers',
        'test_details',
        'clinical_history',
        'temp_sent_18_24',
        'temp_sent_2_8',
        'temp_sent_below_0',
        'temp_received_18_24',
        'temp_received_2_8',
        'temp_received_below_0',
        'specimen_received_datetime',
        'no_of_samples',
        'transported_by',
        'received_by',
        'received_time',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'test_details' => 'array',
        'requisition_date' => 'date',
        'date_of_birth' => 'date',
        'sample_drawn_date' => 'date',
        'lmp_date' => 'date',
        'sample_shipment_date' => 'date',
        'specimen_received_datetime' => 'datetime',
    ];
}
