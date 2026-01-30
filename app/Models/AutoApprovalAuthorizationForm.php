<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoApprovalAuthorizationForm extends Model
{
    use HasFactory;

    protected $table = 'auto_approval_authorization_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'tests_data',
        'criteria_data',
        'authorized_data',
        'log_registration',
        'log_receive',
        'log_result',
        'log_reports',
        'declaration',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tests_data'      => 'array',
        'criteria_data'    => 'array',
        'authorized_data'  => 'array',
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
