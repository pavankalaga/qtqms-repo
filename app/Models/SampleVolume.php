<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleVolume extends Model
{
    use HasFactory;

    protected $fillable = ['container_type', 'sample_quantity', 'sample_review_dates', 'date', 'header_dates', 'month_year'];

    protected $casts = [
        'sample_review_dates' => 'array', // Automatically convert JSON to array
    ];
}
