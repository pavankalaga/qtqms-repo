<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoagulationMnptForm extends Model
{
    use HasFactory;

    protected $table = 'coagulation_mnpt_forms';

    protected $fillable = [
        'doc_no',
        'location',
        'instrument_name',
        'instrument_id',
        'rows_data',
        'geo_mean_pt',
        'geo_mean_aptt',
        'arith_mean_pt',
        'arith_mean_aptt',
        'sd_pt',
        'sd_aptt',
        'mean2sd_pt',
        'mean2sd_aptt',
        'mean_minus_2sd_pt',
        'mean_minus_2sd_aptt',
        'cv_pt',
        'cv_aptt',
        'pt_lot',
        'pt_expiry',
        'pt_performed',
        'aptt_lot',
        'aptt_expiry',
        'aptt_performed',
        'performed_by',
        'verified_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'rows_data' => 'array',
        'pt_expiry' => 'date',
        'pt_performed' => 'date',
        'aptt_expiry' => 'date',
        'aptt_performed' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
