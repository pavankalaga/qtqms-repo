<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbWorkRegister extends Model
{
    use HasFactory;

    protected $table = 'mb_work_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'barcode',
        'patient_name',
        'age_gender',
        'investigation',
        'sample_type',
        'sample_received_datetime',
        'sample_received_by',
        'sample_processing_datetime',
        'sample_processed_by',
        'observations',
        'hod_signature',
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
