<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TissueProcessorReagentForm extends Model
{
    use HasFactory;

    protected $table = 'tissue_processor_reagent_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'formalin1',
        'formalin2',
        'processing_water',
        'alcohol70',
        'alcohol80',
        'alcohol90',
        'absolute1',
        'absolute2',
        'absolute3',
        'xylene1',
        'xylene2',
        'wax1',
        'wax2',
        'cleaning_xylene',
        'cleaning_alcohol',
        'created_by',
        'updated_by',
    ];
}
