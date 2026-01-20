<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterLabComparison extends Model
{
    protected $fillable = [
        'date',
        'registration_no',
        'test_parameter',
        'our_lab_result',
        'referring_lab_result',
        'difference_percentage',
        'acceptable_status',
        'done_by',
        'reviewed_by',
    ];
}
