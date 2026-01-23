<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrineExaminationRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'urine_date',
        'sno',
        'sin_no',
        'patient_name',
        'age_sex',
        'quantity',
        'colour',
        'appearance',
        'blood',
        'bilirubin',
        'urobilinogen',
        'ketone',
        'glucose',
        'protein',
        'ph',
        'nitrites',
        'leucocytosis',
        'specific_gravity',
        'pus_cells',
        'epithelial_cells',
        'rbcs',
        'others',
        'done_by',
        'verified_by',
        'remarks',
    ];
}
