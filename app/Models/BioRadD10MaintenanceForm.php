<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioRadD10MaintenanceForm extends Model
{
    use HasFactory;

    protected $table = 'bio_rad_d10_maintenance_forms';

    protected $fillable = [
        'd10_month_year',
        'd10_location',
        'd10_department',
        'd10_instrument_serial',
        'd10_daily',
        'd10_monthly',
        'd10_year',
        'd10_monthly_instrument_serial'
    ];

    protected $casts = [
        'd10_daily'   => 'array',
        'd10_monthly' => 'array',
    ];
}
