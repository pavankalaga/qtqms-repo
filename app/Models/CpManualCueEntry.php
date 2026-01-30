<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CpManualCueEntry extends Model
{
    protected $table = 'cp_manual_cue_entries';

    protected $fillable = [
        'cue_date',
        'sin_no',
        'analyte',
        'results',
        'done_by',
        'verified_by',
        'remarks',
    ];
}
