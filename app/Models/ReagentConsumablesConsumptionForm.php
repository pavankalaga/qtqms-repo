<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReagentConsumablesConsumptionForm extends Model
{
    use HasFactory;

    protected $table = 'reagent_consumables_consumption_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'department',
        'location',
        'consumption_date',
        'reagent_name',
        'quantity',
        'lot_no',
        'expiry_date',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'consumption_date' => 'date',
        'expiry_date' => 'date',
    ];

    /**
     * Get the user who created this record.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
