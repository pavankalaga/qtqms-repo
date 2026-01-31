<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpiredReagentTracking extends Model
{
    protected $table = 'expired_reagent_trackings';

    protected $fillable = [
        'tracking_month',
        'tracking_year',
        'reagent_name',
        'lot_number',
        'date_manufactured',
        'expiration_date',
        'unit_of_measurement',
        'quantity',
        'removal_date',
        'reported_by',
        'reported_sign',
        'reported_date',
        'approved_by',
        'approved_sign',
        'approved_date',
    ];

    protected $casts = [
        'date_manufactured' => 'date:Y-m-d',
        'expiration_date'   => 'date:Y-m-d',
        'removal_date'      => 'date:Y-m-d',
        'reported_date'     => 'date:Y-m-d',
        'approved_date'     => 'date:Y-m-d',
    ];
}
