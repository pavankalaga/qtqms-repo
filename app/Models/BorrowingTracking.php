<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingTracking extends Model
{
    protected $table = 'borrowing_trackings';

    protected $fillable = [
        'tracking_month',
        'tracking_year',
        'reagent_name',
        'borrowed_from',
        'lot_number',
        'date_manufactured',
        'expiration_date',
        'quantity_unit',
        'lims_ticket',
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
        'reported_date'     => 'date:Y-m-d',
        'approved_date'     => 'date:Y-m-d',
    ];
}
