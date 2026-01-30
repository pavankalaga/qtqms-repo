<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepeatTestForm extends Model
{
    use HasFactory;

    protected $table = 'repeat_test_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'test_date',
        'visit_id',
        'parameter',
        'reason',
        'authorised_by',
        'result_a',
        'result_b',
        'result_c',
        'lims_entry',
        'reviewed_by',
        'created_by',
        'updated_by',
    ];
}
