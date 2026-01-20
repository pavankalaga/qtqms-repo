<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleTestCapability extends Model
{
    use HasFactory;

    protected $fillable = [
        'in_house_check' ,'lab_departments','lab_equipments','lead_id'
    ];

    protected $table = 'sample_test_capability';
}
