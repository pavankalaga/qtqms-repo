<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistilledWater extends Model
{
    use HasFactory;

    protected $table = 'distilled_water';

    protected $fillable = [
        'dated',
        'motor_working',
        'tds',
        'ph',
        'filters',
        'leakage',
        'done_by',
        'instrumentId'
    ];

   
}
