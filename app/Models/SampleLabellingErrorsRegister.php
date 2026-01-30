<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleLabellingErrorsRegister extends Model
{
    use HasFactory;

    protected $table = 'sample_labelling_errors_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'sin_no',
        'label_error',
        'error_by',
        'corrective_action',
        'status',
        'sign',
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
