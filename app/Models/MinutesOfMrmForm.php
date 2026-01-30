<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinutesOfMrmForm extends Model
{
    use HasFactory;

    protected $table = 'minutes_of_mrm_forms';

    protected $fillable = [
        'doc_no',
        'meeting_date',
        'present',
        'absent',
        'venue',
        'start_time',
        'end_time',
        'previous_actions',
        'summary',
        'decisions',
        'current_actions',
        'performance',
        'remarks',
        'next_review',
        'chairperson',
        'chairperson_date',
        'recorder',
        'recorder_date',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'present'          => 'array',
        'absent'           => 'array',
        'previous_actions' => 'array',
        'current_actions'  => 'array',
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
