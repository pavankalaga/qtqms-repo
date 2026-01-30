<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonConformityCorrectiveActionForm extends Model
{
    use HasFactory;

    protected $table = 'non_conformity_corrective_action_forms';

    protected $fillable = [
        'doc_no',
        'location',
        'department',
        'nc_date',
        'non_conformity',
        'responsible_person',
        'root_cause',
        'corrective_action',
        'preventive_action',
        'closure_date',
        'signature',
        'created_by',
        'updated_by',
    ];

    // protected $casts = [
    //     'nc_date' => 'date',
    //     'closure_date' => 'date',
    // ];
}
