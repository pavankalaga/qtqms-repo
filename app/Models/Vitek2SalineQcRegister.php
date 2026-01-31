<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitek2SalineQcRegister extends Model
{
    use HasFactory;

    protected $table = 'vitek2_saline_qc_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'vitek_saline',
        'blood_agar_growth',
        'qc_status',
        'done_by',
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
