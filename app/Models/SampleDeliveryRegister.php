<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleDeliveryRegister extends Model
{
    protected $fillable = [
        'date',
        'barcode',
        'samples',
        'department',
        'taken_from_accession',
        'verified_by',
        'delivered_to_dept',
        'received_at_dept',
        'remarks',
        'location',
        'equipment_id',
        'destination_department'
    ];


}
