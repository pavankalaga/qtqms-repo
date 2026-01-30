<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterLaboratoryComparisonForm extends Model
{
    use HasFactory;

    protected $table = 'inter_laboratory_comparison_forms';

    protected $fillable = [
        'doc_no',
        'lab_a',
        'lab_b',
        'comparison_date',
        'reg_no',
        'test_parameter',
        'result_a',
        'result_b',
        'difference_percent',
        'status',
        'done_by',
        'reviewed_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'result_a' => 'decimal:2',
        'result_b' => 'decimal:2',
        'difference_percent' => 'decimal:2',
    ];
}
