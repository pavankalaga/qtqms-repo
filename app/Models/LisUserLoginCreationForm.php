<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LisUserLoginCreationForm extends Model
{
    use HasFactory;

    protected $table = 'lis_user_login_creation_forms';

    protected $fillable = [
        'doc_no',
        'date',
        'employee_no',
        'employee_name',
        'department',
        'email',
        'lims_id',
        'requested_by',
        'roles',
        'authorized_by',
        'reason',
        'login_created',
        'created_date',
        'login_by',
        'sign',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'roles' => 'array',
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
