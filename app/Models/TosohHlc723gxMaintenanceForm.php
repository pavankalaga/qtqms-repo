<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TosohHlc723gxMaintenanceForm extends Model
{
    protected $table = 'tosoh_hlc_723gx_maintenance_forms';

    protected $fillable = [
        'tosoh_month_year',
        'tosoh_instrument_serial',
        'tosoh_daily',
    ];

    protected $casts = [
        'tosoh_daily' => 'array',
    ];
}
