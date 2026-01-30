<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HivConsentForm extends Model
{
    use HasFactory;

    protected $table = 'hiv_consent_forms';

    protected $fillable = [
        'doc_no',
        // English
        'patient_name', 'age', 'sex', 'form_date', 'address', 'mobile', 'lab_id',
        'consent_given', 'doctor_name', 'doctor_address', 'doctor_contact',
        'patient_signature', 'signature_date',
        // Hindi
        'patient_name_hi', 'age_hi', 'sex_hi', 'form_date_hi', 'address_hi', 'mobile_hi', 'lab_id_hi',
        'consent_given_hi', 'doctor_name_hi', 'doctor_address_hi', 'doctor_contact_hi',
        'patient_signature_hi', 'signature_date_hi',
        // Telugu
        'patient_name_te', 'age_te', 'sex_te', 'form_date_te', 'address_te', 'mobile_te', 'lab_id_te',
        'consent_given_te', 'doctor_name_te', 'doctor_address_te', 'doctor_contact_te',
        'patient_signature_te', 'signature_date_te',

        'created_by', 'updated_by',
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
