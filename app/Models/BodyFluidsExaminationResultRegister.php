<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyFluidsExaminationResultRegister extends Model
{
    use HasFactory;

    protected $table = 'body_fluids_examination_result_registers';

    protected $fillable = [
        'doc_no',
        'check_date',
        'sin_no',
        'analyte_name',
        'done_by',
        'verified_by',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
