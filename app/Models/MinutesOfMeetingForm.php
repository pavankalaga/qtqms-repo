<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinutesOfMeetingForm extends Model
{
    use HasFactory;

    protected $table = 'minutes_of_meeting_forms';

    protected $fillable = [
        'doc_no',
        'meeting_date',
        'venue',
        'start_time',
        'end_time',
        'present_attendees',
        'absent_attendees',
        'previous_meeting_actions',
        'summary_discussions',
        'decisions_made',
        'present_meeting_actions',
        'overall_performance',
        'additional_remarks',
        'next_review_date',
        'chairperson_name',
        'chairperson_date',
        'recorder_name',
        'recorder_date',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'present_attendees' => 'array',
        'absent_attendees' => 'array',
        'previous_meeting_actions' => 'array',
        'present_meeting_actions' => 'array',
        'meeting_date' => 'date',
        'next_review_date' => 'date',
        'chairperson_date' => 'date',
        'recorder_date' => 'date',
    ];
}
