<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftHandoverRegister extends Model
{
    use HasFactory;

    protected $table = 'shift_handover_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'handover_date',
        'barcode',
        'test_name',
        'no_of_samples',
        'pending_reason',
        'handover_by',
        'received_by',
        'remarks',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'handover_date' => 'date',
    ];

    /**
     * Get the user who created this record.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
