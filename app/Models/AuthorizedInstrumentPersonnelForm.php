<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizedInstrumentPersonnelForm extends Model
{
    use HasFactory;

    protected $table = 'authorized_instrument_personnel_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'department',
        'location',
        'daily_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'daily_data' => 'array',
    ];
}
