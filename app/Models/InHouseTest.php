<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InHouseTest extends Model
{
    use HasFactory;

     protected $fillable = [
        'inhouse_test_volume' ,'outsource_test_volume','daily_patient_footfall' ,'inhouse_test_value','outsource_test_value','annual_lab_revenue','lead_id'
    ];

    protected $table = 'in_house_test';
}
