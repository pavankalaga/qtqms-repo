<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistopathologyWorkRegister extends Model
{
    use HasFactory;

    protected $table = 'histopathology_work_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'hp_no',
        'patient_name',
        'age_sex',
        'sin_no',
        'specimen',
        'diagnosis',
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
