<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MrmAttendanceForm extends Model
{
    use HasFactory;

    protected $table = 'mrm_attendance_forms';

    protected $fillable = [
        'doc_no',
        'meeting_date',
        'meeting_time',
        'venue',
        'attendees',
        'remarks',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'attendees' => 'array',
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
