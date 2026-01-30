<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitrationAntibodyReagentForm extends Model
{
    use HasFactory;

    protected $table = 'titration_antibody_reagent_forms';

    protected $fillable = [
        'doc_no',
        'check_date',
        'antibody_reagent',
        'company',
        'lot_number',
        'expiry_date',
        'time',
        'performed_by',
        'reviewed_by',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
