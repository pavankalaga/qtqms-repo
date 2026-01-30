<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboRhTypingResultRegister extends Model
{
    use HasFactory;

    protected $table = 'abo_rh_typing_result_registers';

    protected $fillable = [
        'doc_no',
        'check_date',
        'check_time',
        'sin_no',
        'patient_name',
        'age_sex',
        'pool_a_cells',
        'pool_b_cells',
        'pool_o_cells',
        'anti_a',
        'anti_b',
        'anti_d',
        'result',
        'test_done_by',
        'test_verified_by',
        'approved_by',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
