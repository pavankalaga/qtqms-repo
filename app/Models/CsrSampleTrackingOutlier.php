<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsrSampleTrackingOutlier extends Model
{
    use HasFactory;

    protected $table = 'csr_sample_tracking_outliers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'client_name',
        'client_code',
        'barcode',
        'work_order',
        'trf',
        'clinical_history',
        'sample_volume',
        'temp_pickup',
        'temp_drop',
        'observations',
        'accession_signature',
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
