<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IctDctMalariaResultRegister extends Model
{
    use HasFactory;

    protected $table = 'ict_dct_malaria_result_registers';

    protected $fillable = [
        'doc_no',
        'check_date',
        'sin_no',
        'patient_name',
        'age_sex',
        'analyte_name',
        'result',
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
