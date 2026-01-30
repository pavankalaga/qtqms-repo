<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormalinPreparationForm extends Model
{
    use HasFactory;

    protected $table = 'formalin_preparation_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'ph',
        'volume_prepared',
        'prepared_by',
        'verified_by',
        'remarks',
        'hod_signature',
        'created_by',
        'updated_by',
    ];
}
