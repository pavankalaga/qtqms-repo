<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoopMaintenanceRegister extends Model
{
    use HasFactory;

    protected $table = 'loop_maintenance_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'lot_number',
        'date_calibration',
        'calibration_status',
        'verified_by',
        'hod_sign',
        'remarks',
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
