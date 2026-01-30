<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeishmanStainQcRegister extends Model
{
    use HasFactory;

    protected $table = 'leishman_stain_qc_registers';

    protected $fillable = [
        'doc_no',
        'check_date',
        'buffer_ph',
        'sin_no',
        'smear_prepared_by',
        'shape',
        'thickness',
        'length_of_smear',
        'distribution_of_cells',
        'uniform_stain',
        'deposit',
        'rbc_cytoplasm',
        'wbc_cytoplasm',
        'eosinophils_granules',
        'overall_stain',
        'verified_by',
        'approved_by_hod',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
