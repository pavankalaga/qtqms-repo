<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsrSampleTrackingSheet extends Model
{
    use HasFactory;

    protected $table = 'csr_sample_tracking_sheets';

    protected $fillable = [
        'doc_no',
        'csr_name',
        'route',
        'route_start_time',
        'start_km',
        'end_km',
        'total_km',
        'client_name',
        'client_code',
        'barcode',
        'work_order',
        'trf',
        'clinical_history',
        'sample_volume',
        'temp_pickup',
        'temp_drop',
        'client_signature',
        'pickup_time',
        'created_by',
        'updated_by',
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
