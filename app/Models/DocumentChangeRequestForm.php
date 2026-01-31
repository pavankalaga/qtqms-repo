<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentChangeRequestForm extends Model
{
    use HasFactory;

    protected $table = 'document_change_request_forms';

    protected $guarded = ['id'];

    protected $casts = [
        'document_types'   => 'array',
        'followup_changes' => 'array',
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
