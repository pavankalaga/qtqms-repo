<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MrmAgendaForm extends Model
{
    use HasFactory;

    protected $table = 'mrm_agenda_forms';

    protected $fillable = [
        'doc_no',
        'mrm_date',
        'mrm_time',
        'location',
        'duration',
        'chairperson',
        'recorder',
        'attendees',
        'agenda_completed',
        'confirmation_date',
        'sender_name',
        'contact_details',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'attendees'        => 'array',
        'agenda_completed' => 'array',
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
