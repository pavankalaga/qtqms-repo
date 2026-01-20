<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrineQcLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'blood_1', 'blood_2', 'leucocyte_1', 'leucocyte_2',
        'bilirubin_1', 'bilirubin_2', 'urobilinogen_1', 'urobilinogen_2',
        'ketones_1', 'ketones_2', 'glucose_1', 'glucose_2',
        'proteins_1', 'proteins_2', 'ph_1', 'ph_2',
        'nitrites_1', 'nitrites_2', 'specific_gravity_1', 'specific_gravity_2',
        'performed_by', 'reviewed_by','month_year','instrument_id'
    ];
}
