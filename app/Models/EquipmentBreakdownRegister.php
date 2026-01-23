<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentBreakdownRegister extends Model
{
    protected $table = 'equipment_breakdown_registers';

    protected $fillable = [
        'eb_location',
        'eb_date',
        'eb_equipment',
        'eb_problem',
        'eb_breakdown_time',
        'eb_action_taken',
        'eb_engineer_name',
        'eb_total_downtime',
        'eb_remarks',
        'eb_signature',
    ];
}
