<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlidesBlocksReturnForm extends Model
{
    use HasFactory;

    protected $table = 'slides_blocks_return_forms';

    protected $fillable = [
        'doc_no',
        'date',
        'place',
        'patient_name',
        'old_barcode',
        'new_barcode',
        'client_code',
        'department',
        'slides_blocks',
        'employee_name',
        'employee_signature',
        'receiver_name',
        'receiver_signature',
        'id_proof',
        'mobile',
        'created_by',
        'updated_by',
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
