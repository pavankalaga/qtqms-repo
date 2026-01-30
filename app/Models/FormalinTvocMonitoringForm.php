<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormalinTvocMonitoringForm extends Model
{
    use HasFactory;

    protected $table = 'formalin_tvoc_monitoring_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'location',
        'department',
        'daily_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'daily_data' => 'array',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
