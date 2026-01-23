<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElisaReaderMaintenanceForm extends Model
{
    protected $table = 'elisa_reader_maintenance_forms';

    protected $fillable = [
        'elisa_month_year',
        'elisa_instrument_id',
        'elisa_daily',
    ];

    protected $casts = [
        'elisa_daily' => 'array',
    ];
}
