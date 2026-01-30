<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SodiumHypochloritePreparationForm extends Model
{
    use HasFactory;

    protected $table = 'sodium_hypochlorite_preparation_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'location',
        'department',
        'daily_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'daily_data' => 'array',
    ];
}
