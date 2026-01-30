<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewReagentLotVerificationForm extends Model
{
    use HasFactory;

    protected $table = 'new_reagent_lot_verification_forms';

    protected $fillable = [
        'doc_no',
        'location',
        'department',
        'verification_date',
        'reagent',
        'old_lot',
        'old_expiry',
        'new_lot',
        'new_expiry',
        'analytes',
        'materials_used',
        'specimen_source',
        'old_result',
        'new_result',
        'variation',
        'criteria',
        'acceptable',
        'lab_tech_signature',
        'verified_by',
        'created_by',
        'updated_by',
    ];

    // protected $casts = [
    //     'verification_date' => 'date',
    // ];
}
