<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeckmanDxh560MaintenanceForm extends Model
{
    protected $table = 'beckman_dxh560_maintenance_forms';

    protected $fillable = [
        'dxh560_month_year',
        'dxh560_instrument_serial',
        'dxh560_daily',
        'dxh560_weekly',
        'dxh560_monthly',
        'dxh560_technician',
    ];

    protected $casts = [
        'dxh560_daily'      => 'array',
        'dxh560_weekly'     => 'array',
        'dxh560_monthly'    => 'array',
        'dxh560_technician' => 'array',
    ];
}
