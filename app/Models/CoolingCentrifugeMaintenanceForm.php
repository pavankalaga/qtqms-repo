<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoolingCentrifugeMaintenanceForm extends Model
{
    protected $fillable = [
        'cc_month_year',
        'cc_department',
        'cc_instrument_id',

        // daily
        'cc_daily',

        // monthly
        'cc_bushes_checked_notes',
        'cc_bushes_checked_date',
        'cc_bushes_next_due',
        'cc_monthly_signature',
    ];

    protected $casts = [
        'cc_daily' => 'array',
    ];
}
