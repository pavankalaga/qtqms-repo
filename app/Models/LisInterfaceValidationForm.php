<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LisInterfaceValidationForm extends Model
{
    use HasFactory;

    protected $table = 'lis_interface_validation_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'analyzer_name',
        'instrument_serial',
        'instrument_id',
        'analyzer_type',
        'validation_step_1',
        'validation_step_2',
        'validation_step_3',
        'validation_step_4',
        'validation_step_5',
        'remarks',
        'tests_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tests_data' => 'array',
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
