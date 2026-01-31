<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSterilityCheckRegister extends Model
{
    use HasFactory;

    protected $table = 'media_sterility_check_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'batch_no',
        'media_details',
        'expected_growth',
        'sterility_24',
        'sterility_48',
        'sterility_checked',
        'done_by',
        'checked_by',
        'hod_remarks',
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
