<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReagentVerificationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_year',
        'date',
        'reagent_kit',
        'old_reagent_lot_no',
        'old_reagent_expiry_date',
        'new_reagent_lot_no',
        'new_reagent_expiry_date',
        'analytes',
        'materials_used',
        'specimen_source',
        'result_old_lot',
        'result_new_lot',
        'observed_variation',
        'remarks',
        'scientific_staff_signature',
        'verified_by',
    ];
}
