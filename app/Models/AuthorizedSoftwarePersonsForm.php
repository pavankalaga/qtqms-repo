<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizedSoftwarePersonsForm extends Model
{
    use HasFactory;

    protected $table = 'authorized_software_persons_forms';

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
