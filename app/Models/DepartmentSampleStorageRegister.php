<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentSampleStorageRegister extends Model
{
    use HasFactory;

    protected $table = 'department_sample_storage_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'barcode',
        'sample_received_date',
        'sample_discard_date',
        'discard_by',
        'reviewed_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'sample_received_date' => 'date',
        'sample_discard_date' => 'date',
    ];

    /**
     * Get the user who created this record.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
