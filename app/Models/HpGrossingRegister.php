<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HpGrossingRegister extends Model
{
    use HasFactory;

    protected $table = 'hp_grossing_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'hp_number',
        'alphabets',
        'doctor_name_date',
        'technician_signature',
        'hod_signature',
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
