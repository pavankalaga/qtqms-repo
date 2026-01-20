<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecimenSignature extends Model
{
    use HasFactory;

    protected $table = 'specimen_signature';

    protected $fillable = [
        'department',
        'month_year',
        'employee_name',
        'designation',
        'full_signature',
        'short_signature'
    ];

    protected $casts = [
        'month_year' => 'date',
    ];
}
