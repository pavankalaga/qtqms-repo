<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingAgendaForm extends Model
{
    use HasFactory;

    protected $table = 'meeting_agenda_forms';

    protected $fillable = [
        'doc_no',
        'meeting_date',
        'meeting_time',
        'meeting_location',
        'meeting_duration',
        'chairperson',
        'recorder',
        'attendees',
        'meeting_topic',
        'agenda_items',
        'confirmation_date',
        'sender_name',
        'sender_designation',
        'sender_contact',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'attendees' => 'array',
        'agenda_items' => 'array',
    ];
}
