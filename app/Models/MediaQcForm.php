<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaQcForm extends Model
{
    use HasFactory;

    protected $table = 'media_qc_forms';

    protected $fillable = [
        'doc_no',
        'row_date',
        'product_info',
        'analysis_done_by',
        'appearance',
        'incubation',
        'atcc',
        'growth_expected',
        'growth_observed',
        'capa',
        'signature',
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
