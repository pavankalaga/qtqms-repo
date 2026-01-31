<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizedSpecimenSignature extends Model
{
    use HasFactory;

    protected $table = 'authorized_specimen_signatures';

    protected $guarded = ['id'];

    protected $casts = [
        'signatures' => 'array',
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
