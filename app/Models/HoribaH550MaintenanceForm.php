<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoribaH550MaintenanceForm extends Model
{
    protected $table = 'horiba_h550_maintenance_forms';

    protected $fillable = [

        // filters
        'h550_month_year',
        'h550_instrument_serial',

        // daily maintenance JSON
        'h550_daily',
    ];

    protected $casts = [

        // JSON cast
        'h550_daily' => 'array',
    ];
}
