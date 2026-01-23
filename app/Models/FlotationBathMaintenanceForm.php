<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlotationBathMaintenanceForm extends Model
{
    protected $table = 'flotation_bath_maintenance_forms';

    protected $fillable = [
        'fb_month_year',
        'fb_instrument_id',
        'fb_daily',
    ];

    protected $casts = [
        'fb_daily' => 'array',
    ];
}
