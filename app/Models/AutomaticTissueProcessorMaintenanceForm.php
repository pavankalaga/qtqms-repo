<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutomaticTissueProcessorMaintenanceForm extends Model
{
    protected $table = 'automatic_tissue_processor_maintenance_forms';

    protected $fillable = [
        'month_year',
        'instrument_id',
        'daily',
    ];

    protected $casts = [
        'daily' => 'array',
    ];
}
