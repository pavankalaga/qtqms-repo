<?php

// app/Models/SodiumHypochloriteLog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SodiumHypochloriteLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_date',
        'month_year',
        'original_concentration',
        'quantity_prepared',
        'prepared_by',
        'verified_by',
        'lab_id'
    ];

    protected $dates = ['log_date'];
}
