<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'audit_type',
        'nature_of_audit',
        'audit_start_date',
        'audit_end_date',
        'audit_location',
        'audit_status',
        'departments',
        'auditors',
        'attendees',
        'audit_notes'
    ];

    protected $casts = [
        'departments' => 'array',
        'auditors' => 'array',
        'attendees' => 'array',
    ];

    public function findings()
    {
        return $this->hasMany(AuditFinding::class, 'audit_schedule_id');
    }

    public function getDepartmentsAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?? [];
    }

    // Similar for other JSON fields
    public function getAuditorsAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?? [];
    }

    public function getAttendeesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?? [];
    }
}
