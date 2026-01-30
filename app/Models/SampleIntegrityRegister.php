<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleIntegrityRegister extends Model
{
    use HasFactory;

    protected $table = 'sample_integrity_registers';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'check_date',
        'sample_id',
        'test_parameter',
        'initial_result',
        'next_day_result',
        'percent_difference',
        'is_variation_accepted',
        'done_by',
        'verified_by',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'check_date' => 'date',
        'initial_result' => 'decimal:2',
        'next_day_result' => 'decimal:2',
        'percent_difference' => 'decimal:2',
    ];

    /**
     * Get the user who created this record.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
