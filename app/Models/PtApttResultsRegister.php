<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtApttResultsRegister extends Model
{
    use HasFactory;

    protected $table = 'pt_aptt_results_registers';

    protected $fillable = [
        'doc_no',
        'check_date',
        'sin_no',
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
