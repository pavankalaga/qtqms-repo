<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAmendmentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_year',
        'date',
        'visit_no',
        'parameter',
        'reason_of_amendment',
        'amendment_done_by',
        'original_result',
        'final_result',
    ];
}
