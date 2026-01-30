<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecalcificationRegister extends Model
{
    use HasFactory;

    protected $table = 'decalcification_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'sin',
        'hp_no',
        'patient_name',
        'age_sex',
        'site_of_biopsy',
        'start_date',
        'completed_date',
        'reagent',
        'remarks',
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
