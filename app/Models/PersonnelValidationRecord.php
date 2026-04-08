<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelValidationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'department_name',
        'test_validation',
        'method',
        'person_involved',
        'barcode_no',
        'visit_id_no',
        'result_a',
        'result_b',
        'acceptable_unacceptable',
    ];
}
