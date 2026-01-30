<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyIqcDataMonitoringForm extends Model
{
    use HasFactory;

    protected $table = 'daily_iqc_data_monitoring_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'department',
        'level',
        'instrument_no',
        'control_lot_no',
        'control_expiry',
        'control_lot_no_2',
        'control_expiry_2',
        'daily_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'daily_data' => 'array',
        'control_expiry' => 'date',
        'control_expiry_2' => 'date',
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
