<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model {
    use HasFactory;
    protected $table = 'accessioning';
    protected $fillable = [
        'date_time', 'patient_name', 'parameter', 'collected_by',
        'sample_type', 'reason_for_rejection', 'informed_by_name',
        'informed_by_signature', 'informed_to_name', 'fresh_sample_received', 'reg_no', 'type','reviewed_by','done_by',
        'review_dates','sample_quantity'
    ];
}
