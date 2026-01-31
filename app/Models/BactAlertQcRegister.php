<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BactAlertQcRegister extends Model
{
    use HasFactory;

    protected $table = 'bact_alert_qc_registers';

    protected $fillable = [
        'doc_no',
        'row_date',
        'lot_expiry',
        'atcc_no',
        'inoculum_density',
        'growth_observation',
        'gram_stain_observation',
        'acceptable',
        'not_acceptable',
        'done_by',
        'checked_by',
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
