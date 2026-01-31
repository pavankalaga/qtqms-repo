<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPreparationRegister extends Model
{
    use HasFactory;

    protected $table = 'media_preparation_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'media_name',
        'lot_details',
        'volume_prepared',
        'weight_prepared',
        'autoclave_start',
        'autoclave_end',
        'sterile_holding',
        'total_duration',
        'temperature',
        'pressure',
        'chemical_indicators',
        'biological_indicators',
        'hod_sign',
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
