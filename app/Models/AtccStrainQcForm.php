<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtccStrainQcForm extends Model
{
    use HasFactory;

    protected $table = 'atcc_strain_qc_forms';

    protected $fillable = [
        'doc_no',
        'row_date',
        'atcc_info',
        'characteristics',
        'antibiotic_name',
        'expected_zone',
        'obtained_zone',
        'done_by',
        'capa',
        'approved_by',
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
