<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsrResultsRegister extends Model
{
    use HasFactory;

    protected $table = 'esr_results_registers';

    protected $fillable = [
        'doc_no',
        'check_date',
        'sin_no',
        'esr_start_time',
        'esr_end_time',
        'esr_result',
        'done_by',
        'verified_by',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
