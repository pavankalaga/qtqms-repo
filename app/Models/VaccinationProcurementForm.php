<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinationProcurementForm extends Model
{
    protected $table = 'vaccination_procurement_forms';

    protected $fillable = [
        'purchase_date',
        'vaccine_name',
        'manufacturer_name',
        'supplier_name',
        'lot_no',
    ];
}
