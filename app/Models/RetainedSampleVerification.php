<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetainedSampleVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_year',
        'date',
        'sample_id',
        'test_parameter',
        'initial_result',
        'result_next_day',
        'variation_result',
        'is_variation_accepted',
        'done_by',
        'verified_by'
    ];
}
