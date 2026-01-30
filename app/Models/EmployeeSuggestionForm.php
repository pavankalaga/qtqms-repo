<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSuggestionForm extends Model
{
    use HasFactory;

    protected $table = 'employee_suggestion_forms';

    protected $fillable = [
        'doc_no',
        'employee_name',
        'suggestion_date',
        'employee_id',
        'staff_suggestions',
        'suggested_requirements',
        'employee_signature',
        'corrective_action_management',
        'lab_supervisor',
        'lab_director_signature',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'suggestion_date' => 'date',
    ];
}
