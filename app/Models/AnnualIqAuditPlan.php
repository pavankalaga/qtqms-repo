<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualIqAuditPlan extends Model
{
    use HasFactory;

    protected $table = 'annual_iq_audit_plans';

    protected $guarded = ['id'];

    protected $casts = [
        'plan_data' => 'array',
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
