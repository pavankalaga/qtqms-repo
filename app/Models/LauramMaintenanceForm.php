<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LauramMaintenanceForm extends Model
{
    use HasFactory;

    protected $table = 'lauram_maintenance_forms';

    protected $fillable = [
        'lauram_month_year',
        'lauram_instrument_id',
        'lauram_daily',
    ];

    protected $casts = [
        'lauram_daily' => 'array',
    ];
}
