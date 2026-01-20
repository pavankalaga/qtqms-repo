<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditFinding extends Model
{
    use HasFactory;

    protected $fillable = [
        'audit_schedule_id',
        'audit_date',
        'department',
        'assessor',
        'nc_type',
        'major',
        'minor',
        'observations',
        'details',
    ];
    public function auditSchedule()
    {
        return $this->belongsTo(AuditSchedule::class, 'audit_schedule_id');
    }
}
