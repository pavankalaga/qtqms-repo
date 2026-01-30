<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCleanlinessLogForm extends Model
{
    use HasFactory;

    protected $table = 'daily_cleanliness_log_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'floor',
        'location',
        'daily_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'daily_data' => 'array',
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
