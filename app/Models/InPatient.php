<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InPatient extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_of_beds' ,'no_of_doctors','hos_revenue' ,'expected_speciality','lead_id'
    ];

    protected $table = 'in_patient';
}
