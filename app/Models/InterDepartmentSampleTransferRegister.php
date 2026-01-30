<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterDepartmentSampleTransferRegister extends Model
{
    use HasFactory;

    protected $table = 'inter_department_sample_transfer_registers';

    protected $fillable = [
        'doc_no',
        'location',
        'barcode',
        'sample_received_datetime',
        'parameter',
        'from_department',
        'to_department',
        'sample_processed_datetime',
        'handed_over_by',
        'receiving_sign',
        'verified_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'sample_received_datetime' => 'datetime',
        'sample_processed_datetime' => 'datetime',
    ];

    /**
     * Get the user who created this record.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
