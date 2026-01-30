<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAidKitMonitoringForm extends Model
{
    use HasFactory;

    protected $table = 'first_aid_kit_monitoring_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'location',
        'department',
        'items_available',
        'expiry_date_1',
        'replaced_item',
        'quantity_replaced',
        'expiry_date_2',
        'replaced_on',
        'replaced_by',
        'remarks',
        'verified_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'expiry_date_1' => 'date',
        'expiry_date_2' => 'date',
        'replaced_on' => 'date',
    ];

    /**
     * Get the user who created this record.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this record.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
