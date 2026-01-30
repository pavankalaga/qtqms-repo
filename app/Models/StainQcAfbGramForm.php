<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StainQcAfbGramForm extends Model
{
    use HasFactory;

    protected $table = 'stain_qc_afb_gram_forms';

    protected $fillable = [
        'doc_no',
        'row_date',
        'manufacturer',
        'lot_no',
        'expiry_date',
        'atcc',
        'result_expected',
        'result_obtained',
        'done_by',
        'corrective_action',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
