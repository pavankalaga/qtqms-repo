<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoolExaminationRegister extends Model
{
    protected $fillable = [
        'stool_date',
        'location',
        'sno',
        'sin_no',
        'patient_name',
        'age_sex',
        'analyte_name',
        'colour',
        'consistency',
        'mucus',
        'blood',
        'worms',
        'reducing_substance',
        'reaction',
        'pus_cells',
        'epithelial_cells',
        'rbc',
        'macrophages',
        'fat_globulins',
        'starch_granules',
        'ova',
        'cyst',
        'larva',
        'undigested_food',
        'occult_blood',
        'others',
        'done_by',
        'verified_by',
        'remarks',
    ];

}
