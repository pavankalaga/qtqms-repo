<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticNeeds extends Model
{
    use HasFactory;

     protected $fillable = [
        'routine' ,'speciality','genetics' ,'super_speciality','expected_business','lead_id'
    ];

    protected $table = 'diagnostic_needs';
}
