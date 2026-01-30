<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlidesBlocksReturnRegister extends Model
{
    use HasFactory;

    protected $table = 'slides_blocks_return_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'sin_no',
        'patient_name',
        'age_sex',
        'hp_details',
        'handover_sign',
        'received_by',
        'remarks',
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
