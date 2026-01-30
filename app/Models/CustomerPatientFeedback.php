<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPatientFeedback extends Model
{
    use HasFactory;

    protected $table = 'customer_patient_feedbacks';

    protected $fillable = [

        // BASIC DETAILS
        'name',
        'barcode',
        'date',
        'address',
        'contact_no',

        // RATINGS
        'rating_0',
        'rating_1',
        'rating_2',
        'rating_3',
        'rating_4',
        'rating_5',
        'rating_6',
        'rating_7',
        'rating_8',

        // REMARKS
        'remarks_0',
        'remarks_1',
        'remarks_2',
        'remarks_3',
        'remarks_4',
        'remarks_5',
        'remarks_6',
        'remarks_7',
        'remarks_8',

        // FEEDBACK
        'additional_feedback',

        // SIGNATURE
        'signature',

        // OFFICE USE
        'communicated',
        'complainant_id',
        'complaint_date',
        'complaint_description',
        'complaint_action',
        'closure_date',

        // ACTION
        'by',
        'on',
        'preventive_action',

        // APPROVAL
        'reviewed_by',
        'approved_by',
    ];
}
