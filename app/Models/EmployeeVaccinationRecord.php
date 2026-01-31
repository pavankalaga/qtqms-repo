<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeVaccinationRecord extends Model
{
    protected $table = 'employee_vaccination_records';

    protected $fillable = [
        'emp_id',
        'name',
        'department',
        'designation',
        'dose1_due',
        'dose1_given',
        'dose1_lot',
        'dose2_due',
        'dose2_given',
        'dose2_lot',
        'dose3_due',
        'dose3_given',
        'dose3_lot',
        'titre',
        'status',
        'signature',
    ];
}
