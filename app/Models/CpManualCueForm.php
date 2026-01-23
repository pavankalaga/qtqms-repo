<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CpManualCueForm extends Model
{
    protected $table = 'cp_manual_cue_forms';

    protected $fillable = [
        'month_year',
        'instrument_id',
        'rows',
    ];

    protected $casts = [
        'rows' => 'array',
    ];
}
