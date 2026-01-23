<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BactAlertMaintenanceForm extends Model
{
    protected $table = 'bact_alert_maintenance_forms';

    protected $fillable = [

        // FILTER FIELDS
        'ba_month_year',
        'ba_instrument_id',

        // DAILY JSON
        'ba_daily',

        // DOC META
        'doc_no',
        'issue_no',
        'issue_date',
    ];

    protected $casts = [
        'ba_daily' => 'array',
    ];
}
