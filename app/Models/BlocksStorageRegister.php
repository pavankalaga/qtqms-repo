<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlocksStorageRegister extends Model
{
    use HasFactory;

    protected $table = 'blocks_storage_registers';

    protected $fillable = [
        'doc_no',
        'rows_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'rows_data' => 'array',
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
