<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicianFeedbackForm extends Model
{
    use HasFactory;

    protected $table = 'ge_physician_feedback_forms';

    protected $fillable = [
        'doc_no',
        'month_year',
        'client_code',
        'ratings',
        'comments',
        'doctor_name',
        'doctor_signature',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'ratings' => 'array',
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
