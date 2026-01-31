<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizedSignatoryList extends Model
{
    use HasFactory;

    protected $table = 'authorized_signatory_lists';

    protected $guarded = ['id'];

    protected $casts = [
        'signatories' => 'array',
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
