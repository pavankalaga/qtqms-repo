<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecallTracking extends Model
{
    protected $table = 'recall_trackings';

    protected $fillable = [
        // Product Information
        'product_category',
        'product_name',
        'manufacturer',
        'supplier',
        'lot_number',
        'batch_number',
        'date_of_manufacture',
        'expiry_date',
        'quantity_on_hand',

        // Reason & Notes
        'reason',
        'additional_notes',

        // Disposal
        'disposal',
        'disposal_details',

        // Locations (JSON array)
        'locations',

        // Declaration
        'store_manager',
        'designation',
        'store_date',
        'store_signature',
    ];

    protected $casts = [
        'date_of_manufacture' => 'date:Y-m-d',
        'expiry_date'         => 'date:Y-m-d',
        'store_date'          => 'date:Y-m-d',
        'reason'              => 'array',
        'disposal'            => 'array',
        'locations'           => 'array',
    ];
}
