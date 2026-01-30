<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MrmTaskComplianceForm extends Model
{
    use HasFactory;

    protected $table = 'mrm_task_compliance_forms';

    protected $fillable = [
        'doc_no',
        'meeting_date',
        'tasks',
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
        'tasks' => 'array',
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
